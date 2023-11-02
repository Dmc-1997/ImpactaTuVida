<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

use App\Models\Users\User;
use App\Models\Ubication\Country;
use App\Models\Ubication\Department;
use App\Models\Ubication\City;

class Ubication extends Component
{
    //location component
    public $parameters;
    public $country_id;
    public $state_id = '';
    public $city_id = '';
    public $cities = "";
    public $departments = "";
    //public $countries = "";
    public $isEditing = 0;


    public function render()
    {
        $countries = Country::get();
        if (!$this->isEditing) {
            if ($this->parameters->country_id) {
                $this->country_id = $this->parameters->country_id;
                $this->findStates();
                if ($this->parameters->state_id) {
                    $this->state_id = $this->parameters->state_id;
                    $this->findCities();
                    if ($this->parameters->city_id) {
                        $this->city_id = $this->parameters->city_id;
                    }
                }
            }
            $this->isEditing = 1;
        }
        

        return view('livewire.partials.ubication', ["countries" => $countries]);
    }

    public function clear()
    {

    }

    //location component
    public function findStates()
    {
        $this->departments = Department::whereCountry_id($this->country_id)->get();
        $this->state_id = '';
        $this->findCities();
    }

    public function findCities()
    {
        $this->cities = City::whereDepartment_id($this->state_id)->get();
        $this->city_id = '';
    }
}
