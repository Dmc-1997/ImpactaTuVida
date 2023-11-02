<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Fivestars extends Component
{
    public $color;
    public $rated;
    public $show;
    public $dateago;

    public function render()
    {
        return view('livewire.partials.fivestars');
    }
}
