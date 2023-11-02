<?php

namespace App\Http\Livewire;

use App\Mail\ContactEmail;
use Livewire\Component;

use Illuminate\Support\Facades\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Component implements ShouldQueue
{
    public $name;
    public $email;
    public $phone;
    public $position;
    public $company;
    public $country;
    public $employees;
    public $message;
    public $terms = 1;

    public function render()
    {
        return view('livewire.contact-form');
    }

    public function submit()
    {
        $this->validate([
            'name'       => 'string|min:3|max:120|required',
            'email'      => 'string|email|max:255|required',
            'phone'      => 'string|min:7|max:15|required',
            // 'position'   => 'string|min:3|max:1024|required',
            // 'company'    => 'string|min:3|max:1024|required',
            // 'country'    => 'string|min:3|max:1024|required',
            // 'employees'  => 'string|min:1|max:1024|required',
            'terms'      => 'gt:0|required'
        ]);

        try {
            Mail::to('iohansandoval@gmail.com')->send(new ContactEmail($this->name, $this->email, $this->phone, $this->position, $this->company, $this->country, $this->employees));
        } catch (\Throwable $th) {
            throw $th;
        }


        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->position = '';
        $this->company = '';
        $this->country = '';
        $this->employees = '';
        $this->message = 1;


    }
}
