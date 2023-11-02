<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $position;
    public $company;
    public $country;
    public $employees;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $position = null, $company = null, $country = null, $employees = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->position = $position;
        $this->company = $company;
        $this->country = $country;
        $this->employees = $employees;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contacto Impacta tu vida')->markdown('emails.contact');
    }
}
