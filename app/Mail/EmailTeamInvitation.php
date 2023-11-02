<?php

namespace App\Mail;

use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Helpers\Utils;
class EmailTeamInvitation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $emailConfirmationUrl;
    public $team_name;
    public $incharge_name;
    public $incharge_role;
    public $incharge_email;
    public $incharge_phone;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $team_id)
    {
        $password = Utils::genRandAlphaNumber(16);
        $user->password = bcrypt($password);
        $user->save();
        $this->password = $password;

        $team = Team::whereId($team_id)->first();
        if (is_null($team)) {
            $team_name = 'Mi equipo';
        } else {
            $team_name = $team->name;
        }
        $this->user = $user;
        $this->emailConfirmationUrl = url('invitation/'.$user->id.'/'.$user->confirmation_code);
        $this->team_name = $team_name;
        $this->incharge_name = $team->incharge_name;
        $this->incharge_role = $team->incharge_role;
        $this->incharge_email = $team->incharge_email;
        $this->incharge_phone = $team->incharge_phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invitación')->markdown('emails.invitation');
    }
}
