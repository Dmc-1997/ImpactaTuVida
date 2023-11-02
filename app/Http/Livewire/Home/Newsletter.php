<?php

namespace App\Http\Livewire\Home;

use App\Models\Home\Newsletter as HomeNewsletter;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class Newsletter extends Component
{
    public $email;
    public $allow;
    public $terms;
    public $session_id;
    public $ip;
    public $message = '';

    public function mount()
    {
        $this->session_id = Session::getId();
    }

    public function render()
    {
        $this->allow = 1;
        $session_ready = HomeNewsletter::where('session_id','LIKE',"%$this->session_id%")->first();
        if (!is_null($session_ready)) {
            $this->allow = 0;
        }

        $email_ready = HomeNewsletter::where('email','LIKE',"%$this->email%")->first();
        if (!is_null($email_ready)) {
            $this->allow = 0;
        }

        return view('livewire.home.newsletter');
    }

    public function save()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        $subscription = HomeNewsletter::where('email','LIKE',"%$this->email%")
        ->orwhere('session_id','LIKE',"%$this->session_id%")
        ->first();
        if (is_null($subscription)) {
            $subscription = new HomeNewsletter();
            $subscription->email = $this->email;
            $subscription->name = '';
            $subscription->session_id = $this->session_id;
            $subscription->ip_address = request()->ip();
            $subscription->active = 0;
            $subscription->save();

            $this->message = 'Suscripción en progreso...';

            try {
                Mail::to('iohansandoval@gmail.com')->send(new ContactEmail('Unknown', $this->email, '', '', '', '', ''));
            } catch (\Throwable $th) {
                throw $th;
            }

        }

        $this->email = '';

    }
}
