<?php

namespace App\Actions\Fortify;

use App\Helpers\Consult;
use App\Helpers\DigitalOcean;
use App\Models\Team;
use App\Models\Users\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            //'surname' => ['required', 'string', 'max:255'],
            //'company' => ['required', 'string', 'max:255'],
            //'nit' => ['required', 'string', 'max:255'],
            //'country' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            //'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                //'surname' => $input['surname'],
                'company' => $input['company'],
                //'nit' => $input['nit'],
                //'country' => $input['country'],
                'phone' => $input['phone'],
                //'address' => $input['address'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);

                //enviar correo para contactarlo
                try {
                    $email = Consult::getStoreConfig('notification_email');
                    if ($email) {
                        Mail::to($email)->send(new ContactEmail($user->name, $user->email, '',  '', '', '', ''));
                    }
                } catch (\Throwable $th) {
                    throw $th;
                }

            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $team = Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]);
        $user->current_team_id = $team->id;
        $user->save();

        $subdomain = Str::slug($user->company, '-');

        //verificar que no exista el subdominio
        $other_team = Team::whereSubdomain($subdomain)->first();
        if (!is_null($other_team)) {
            $subdomain = $subdomain . rand(1000, 10000);
        }

        $domain_record_id = DigitalOcean::createDomainRecord($subdomain);
        if ($domain_record_id) {
            $team->domain_record_id = $domain_record_id;
            $team->save();

            $user->subdomain = $subdomain;
            $user->save();
        }


        // $user->ownedTeams()->save(Team::forceCreate([
        //     'user_id' => $user->id,
        //     'name' => explode(' ', $user->name, 2)[0]."'s Team",
        //     'personal_team' => true,
        // ]));
    }
}
