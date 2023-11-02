<?php

namespace App\Http\Livewire\Businesses\Users;

use App\Models\Teams\TeamUser;
use Livewire\Component;

use Livewire\WithPagination;

use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Helpers\Consult;
use App\Models\Team;
use App\Models\User as ModelsUser;

class Table extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '25'],
    ];

    public $typeView = "table";
    public $search = "";
    public $perPage = '25';
    public $current_team_id;


    public $item_id;
    public $name;
    public $editName = 0;
    public $surname;
    public $editSurname = 0;
    public $email;
    public $editEmail = 0;
    public $password;

    public $updown = 'desc';
    public $str_filter = 'users.id';
    public $editPassword = 0;

    protected $listeners = ['userAddedToTeam'];

    public function mount()
    {
        $this->current_team_id = Auth::user()->current_team_id;
    }

    public function render()
    {
        if(!\Session::has('type-view-users')){
            \Session::put('type-view-users', 'table');
        }else{
            $this->typeView = \Session::get('type-view-users');
        }

        $start_time = microtime(true);
        if ($this->perPage > 100) {
            $this->perPage = 100;
        } else if ($this->perPage < 0) {
            $this->perPage = 0;
        }

        //usuarios del equipo relacionados al equipo de este usuario
        $user_teams = TeamUser::whereTeam_id($this->current_team_id)->get();
        $ids = array();
        foreach ($user_teams as $user_team) {
            $ids[] = $user_team->user_id;
        }

        $users = User::search("%{$this->search}%")
        ->whereCurrent_team_id($this->current_team_id)
        ->whereIn('id', $ids)
        ->orderBy($this->str_filter, $this->updown)
        ->paginate($this->perPage);

        //dd($users);

        //verificar que todos los usuarios tengan el subdominio
        $team = Team::find($this->current_team_id);
        if (!is_null($team)) {
            User::whereIn('id', $ids)->update(['subdomain' => $team->subdomain]);
        }

        return view('livewire.businesses.users.table', ['users' => $users]);
    }

    public function sortData($str_filter, $updown)
    {
        $this->str_filter = $str_filter;
        $this->updown = $updown;
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

    public function userAddedToTeam()
    {

    }

    public function editName($item_id)
    {
        $data = User::find($item_id);
        $this->name = $data->name;

        $this->item_id = $item_id;
        $this->editName = $item_id;
    }

    public function updateName($item_id)
    {
        $data = User::find($item_id);
        $data->name = $this->name;
        $data->save();

        $this->name  = '';
        $this->editName = 0;
        $this->item_id = 0;
    }

    public function editSurname($item_id)
    {
        $data = User::find($item_id);
        $this->surname = $data->surname;

        $this->item_id = $item_id;
        $this->editSurname = $item_id;
    }

    public function updateSurname($item_id)
    {
        $data = User::find($item_id);
        $data->surname = $this->surname;
        $data->save();

        $this->surname  = '';
        $this->editSurname = 0;
        $this->item_id = 0;
    }

    public function editEmail($item_id)
    {
        $data = User::find($item_id);
        $this->email = $data->email;

        $this->item_id = $item_id;
        $this->editEmail = $item_id;
    }

    public function updateEmail($item_id)
    {
        $data = User::find($item_id);
        $data->email = $this->email;
        $data->save();

        $this->email  = '';
        $this->editEmail = 0;
        $this->item_id = 0;
    }

    public function sendInvitationAgain($item_id)
    {
        $data = User::find($item_id);
        $email = $data->email;

        $message = Consult::emailInvitation($email, $this->current_team_id);

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => $message]);

        $this->dispatchBrowserEvent('user-added-to-team');
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

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' =>'Actualizado']);
    }

    public function cancelEditPassword()
    {
        $this->password = '';
        $this->editPassword = 0;
    }

    public function loadTypeView($type)
    {
        \Session::put('type-view-users', $type);
        $this->typeView = $type;
    }
}
