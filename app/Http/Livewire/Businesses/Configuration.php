<?php

namespace App\Http\Livewire\Businesses;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Configuration extends Component
{
    protected $queryString = [
        'navsubmenu' => ['except' => '0']
    ];

    public $navsubmenu = 0;

    public $data;
    public $name;
    public $team_id;
    public $logo;
    public $bg_image;
    public $bg_color;
    public $style_login;
    public $style_admin;
    public $style_academy;
    public $incharge_name;
    public $incharge_role;
    public $incharge_email;
    public $incharge_phone;


    public function mount()
    {
        $this->name = $this->data->name;
        $this->team_id = $this->data->id;
        $this->logo = $this->data->logo;
        $this->bg_image = $this->data->bg_image;
        $this->bg_color = $this->data->bg_color;
        $this->style_login = $this->data->style_login;
        $this->style_admin = $this->data->style_admin;
        $this->style_academy = $this->data->style_academy;

        $this->incharge_name = $this->data->incharge_name;
        $this->incharge_role = $this->data->incharge_role;
        $this->incharge_email = $this->data->incharge_email;
        $this->incharge_phone = $this->data->incharge_phone;

    }

    public function render()
    {
        $team = Team::whereId(Auth::user()->current_team_id)->first();
        $bg_image = $team->bg_image;

        return view('livewire.businesses.configuration', ['team' => $team, 'bg_image' => $bg_image]);
    }

    public function setNav($navsubmenu)
    {
        $this->navsubmenu = $navsubmenu;
    }

    public function saveInformation()
    {
        $this->validate([
            'name' => 'min:3|max:255|required'
        ]);

        $team = Team::whereId($this->team_id)->first();
        $team->name = $this->name;
        $team->bg_color = $this->bg_color;
        $team->style_login = $this->style_login;
        $team->style_admin = $this->style_admin;
        $team->style_academy = $this->style_academy;
        $team->incharge_name = $this->incharge_name;
        $team->incharge_role = $this->incharge_role;
        $team->incharge_email = $this->incharge_email;
        $team->incharge_phone = $this->incharge_phone;
        $team->save();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Información actualizada']);
    }


}
