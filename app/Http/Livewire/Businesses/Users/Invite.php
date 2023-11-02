<?php

namespace App\Http\Livewire\Businesses\Users;

use App\Helpers\Utils;
use App\Mail\EmailTeamInvitation;
use App\Models\TeamInvitation;
use App\Models\Teams\TeamUser;
use Livewire\Component;

use App\Models\Users\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Helpers\Consult;

class Invite extends Component
{
    public $emails;

    public $current_team_id;

    public function mount()
    {
        $this->current_team_id = Auth::user()->current_team_id;
    }

    public function render()
    {
        return view('livewire.businesses.users.invite');
    }

    public function invite()
    {
        $emails = explode(',', $this->emails);
        foreach ($emails as $email) {

            $message = Consult::emailInvitation($email, $this->current_team_id);

            $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => $message]);

            $this->dispatchBrowserEvent('user-added-to-team');


        }

        $this->emails = '';

    }


}
