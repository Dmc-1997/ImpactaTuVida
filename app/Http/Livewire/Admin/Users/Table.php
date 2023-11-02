<?php

namespace App\Http\Livewire\Admin\Users;

use App\Helpers\Consult;
use App\Helpers\DigitalOcean;
use App\Helpers\Utils;
use App\Models\Team;
use App\Models\Teams\TeamUser;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

use App\Models\Users\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNewUser;

class Table extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '25'],
        'perRole' => ['except' => '0']
    ];

    public $typeView = "table";
    public $search = "";
    public $perPage = '25';
    public $perRole = '0';

    public $user_role;
    public $supplier_id;
    public $subdomain;
    public $password;

    public $editRole = 0;
    public $editSupplier = 0;
    public $editSubdomain = 0;
    public $editPassword = 0;


    protected $listeners = ['adminUserDelete'];

    public function render()
    {
        if(!\Session::has('type-view-card')){
            \Session::put('type-view-card', 'table');
        }else{
            $this->typeView = \Session::get('type-view-card');
        }
        
        $start_time = microtime(true);
        if ($this->perPage > 100) {
            $this->perPage = 100;
        } else if ($this->perPage < 0) {
            $this->perPage = 0;
        }

        if ($this->perRole) {
            $users = User::search("%{$this->search}%")
            ->whereRole($this->perRole)
            ->paginate($this->perPage);
        } else {
            $users = User::search("%{$this->search}%")
            ->paginate($this->perPage);
        }

        return view('livewire.admin.users.table', ['users' => $users]);
    }

    //role
    public function editRole($item_id)
    {
        $data = User::find($item_id);
        $this->user_role = $data->role;

        $this->editRole = $item_id;
    }

    public function updateRole($item_id)
    {
        $data = User::find($item_id);
        $data->role = $this->user_role;
        $data->save();

        $this->user_role = '';
        $this->editRole = 0;
    }

    public function cancelEditRole()
    {
        $this->user_role = '';
        $this->editRole = 0;
    }

    //editar proveedor
    public function editSupplier($item_id)
    {
        $data = User::find($item_id);
        $this->supplier_id = $data->supplier_id;

        $this->editSupplier = $item_id;
    }

    public function updateSupplier($item_id)
    {
        $data = User::find($item_id);
        $data->supplier_id = $this->supplier_id;
        $data->save();

        $this->user_role = '';
        $this->editSupplier = 0;
    }

    public function cancelEditSupplier()
    {
        $this->supplier_id = '';
        $this->editSupplier = 0;
    }

    //editar subdominio
    public function editSubdomain($item_id)
    {
        $data = User::find($item_id);
        $this->subdomain = $data->subdomain;

        $this->editSubdomain = $item_id;
    }

    public function updateSubdomain($item_id)
    {
        $user = User::find($item_id);
        $user->subdomain = $this->subdomain;
        $user->save();

        if ($user->role == 'business') {
            //obtener el equipo del usuario
            $team = Team::find($user->current_team_id);
            if (!is_null($team)) {
                $team->subdomain = $this->subdomain;
                $team->save();

                //crear subdominio y guardar el id en el equipo
                if ($team->domain_record_id) {
                    //borrar
                    DigitalOcean::deleteDomainRecord($team->domain_record_id);
                }
                $domain_record_id = DigitalOcean::createDomainRecord($this->subdomain);
                if ($domain_record_id) {
                    $team->domain_record_id = $domain_record_id;
                    $team->save();
                }

                $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Subdominio actualizado']);
                //actualice a los usuairos del equipo
                $team_users = TeamUser::whereTeam_id($team->id)->get();
                foreach ($team_users as $team_user) {
                    $user = User::whereId($team_user->user_id)->first();
                    if (!is_null($user)) {
                        $user->subdomain = $this->subdomain;
                        $user->save();
                    }
                }
            }
        }



        $this->user_role = '';
        $this->editSubdomain = 0;

        //$this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Subdominio actualizado']);
    }

    public function cancelEditSubdomain()
    {
        $this->subdomain = '';
        $this->editSubdomain = 0;
    }






    //editar password
    public function editPassword($item_id)
    {
        $data = User::find($item_id);
        $this->password = '';

        $this->editPassword = $item_id;
    }

    public function updatePassword($item_id)
    {
        $data = User::find($item_id);
        $data->password = Hash::make($this->password);
        $data->save();

        $this->password = '';
        $this->editPassword = 0;
    }

    public function cancelEditPassword()
    {
        $this->password = '';
        $this->editPassword = 0;
    }


    public function adminUserDelete($item_id)
    {
        $user = User::find($item_id);
        $user->delete();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Usuario eliminado']);
    }

    public function toggle($item_id)
    {
        $data = User::find($item_id);
        $active = $data->active;
        $active++;
        if ($active > 2) {
            $active = 0;
        }
        $data->active = $active;
        $data->save();

    }

    public function sendNewPassword($user_id)
    {
        $password = Utils::genRandAlphaNumber(16);

        $user = User::find($user_id);
        $user->password =  Hash::make($password);
        $user->save();

        $allow_to_send = 1;
        if ($allow_to_send) {
            try {
                Mail::to($user)->send(new EmailNewUser($user, $password));
                $email = Consult::getStoreConfig('notification_email');
                Mail::to($email)->send(new EmailNewUser($user, $password));
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Email enviado']);
    }

    public function loadTypeView($type)
    {
        \Session::put('type-view-card', $type);
        $this->typeView = $type;
    }
}
