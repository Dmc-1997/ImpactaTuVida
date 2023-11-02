<?php

namespace App\Http\Livewire\Members;

use App\Models\Users\User;
use Livewire\Component;

class Profile extends Component
{
    public $data;
    public $user_id;

    public $name;
    public $surname;
    public $email;
    public $mobile;
    public $age;
    public $position;

    public function mount()
    {
        $this->user_id = $this->data->id;
        $this->name = $this->data->name;
        $this->surname = $this->data->surname;
        $this->email = $this->data->email;
        $this->mobile = $this->data->mobile;
        $this->age = $this->data->age;
        $this->position = $this->data->position;
    }

    public function render()
    {
        return view('livewire.members.profile');
    }

    public function update()
    {
        $data = User::find($this->user_id);
        $data->name = $this->name;
        $data->surname = $this->surname;
        $data->mobile = $this->mobile;
        $data->age = $this->age;
        $data->position = $this->position;
        $data->save();

        $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Actualizado correctamente']);

    }
}
