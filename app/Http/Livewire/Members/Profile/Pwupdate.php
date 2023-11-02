<?php

namespace App\Http\Livewire\Members\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Utils;
use App\Models\Users\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Pwupdate extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function render()
    {
        return view('livewire.members.profile.pwupdate');
    }

    public function update()
    {
        $this->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        if (! isset($this->current_password) || ! Hash::check($this->current_password, $user->password)) {
            $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'contraseñas no coinciden']);
            return false;
        }

        $user->forceFill([
            'password' => Hash::make($this->password),
            'update_password' => 0,
        ])->save();

        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        DB::table('sessions')->where('user_id', '=', Auth::user()->getAuthIdentifier())->delete();
        //Auth::logout();
        //Auth::session()->invalidate();
        //Auth::session()->regenerateToken();

        $url = url('/ingresar');
        return redirect()->away($url);
    }
}
