<?php

namespace App\Mail;

use App\Helpers\Utils;
use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNewUser extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $password;
    public $loginUrl;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;

        $r = route('index');
        $find = '://'.$user->subdomain.'.';
        $exist =  Utils::existInString($r, $find);
        if (!$exist) {
            $r = str_replace('://', '://'.$user->subdomain.'.', $r);
        }

        $this->loginUrl = $r.'/ingresar';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Impacta tu vida')->markdown('emails.newuser');
    }
}
