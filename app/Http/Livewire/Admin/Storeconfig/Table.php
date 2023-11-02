<?php

namespace App\Http\Livewire\Admin\Storeconfig;

use App\Helpers\Starter;
use Livewire\Component;
use App\Models\Config\StoreConfig;

use App\Helpers\Utils;

class Table extends Component
{
    public $item_id = 0;
    public $value = "";
    public $data = "";
    public $editItem  = 0;

    public $group = 1;
    public $type  = 'text';

    public $isEditing = 0;


    public function render()
    {
        $storeconfigs = StoreConfig::get();

        return view('livewire.admin.storeconfig.table', ["storeconfigs" => $storeconfigs]);
    }

    public function  default()
    {
        $this->item_id = 0;
        $this->value = '';
        $this->label = '';
        $this->isEditing = 0;
    }


    public function selectGroup($group)
    {
        $this->group = $group;

    }

    public function edit($item_id)
    {
        $data = StoreConfig::find($item_id);

        $this->item_id    = $item_id;
        $this->isEditing   = $item_id;
        $this->value      = $data->value;
    }

    public function cancelEdit()
    {
        $this->isEditing  = 0;
        $this->item_id = 0;
    }

    public function update()
    {
        $data = StoreConfig::find($this->item_id);
        $data->value = $this->value;
        $data->save();

        $this->cancelEdit();
    }

    public function genApiKey($item_id)
    {
        $data = StoreConfig::find($item_id);
        $data->value = Utils::genRandAlphaNumber(32);
        $data->save();
    }

    public function loadStarter()
    {
        Starter::storeInitialConfig();

        $this->dispatchBrowserEvent('show-message', ['type' => 'info', 'message' => 'Debug Activado']);
    }
}
