<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Artisan;

class Debug extends Component
{
    public $count = 0;
    public $value = 0;

    public function mount()
    {
        $this->value = (env('APP_DEBUG')) ? 1 : 0;
    }

    public function render()
    {
        $this->count++;

        return view('livewire.debug');
    }

    public function toggle()
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        $str .= "\r\n";

        $envKey = 'APP_DEBUG';
        $envValue = (env('APP_DEBUG')) ? 'false' : 'true';

        $keyPosition = strpos($str, "$envKey=");
        $endOfLinePosition = strpos($str, "\n", $keyPosition);
        $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
        if (is_bool($keyPosition) && $keyPosition === false) {
            // variable doesnot exist
            $str .= "$envKey=$envValue";
            $str .= "\r\n";
        } else {
            // variable exist
            $str = str_replace($oldLine, "$envKey=$envValue", $str);
        }
        $str = substr($str, 0, -2);
        if (!file_put_contents($envFile, $str)) {
            return false;
        }
        app()->loadEnvironmentFrom($envFile);

        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        $this->value = !$this->value;

        if ($this->value) {
            $this->dispatchBrowserEvent('show-message', ['type' => 'error', 'message' => 'Debug Activado']);
        } else {
            $this->dispatchBrowserEvent('show-message', ['type' => 'success', 'message' => 'Sitio seguro']);
        }

    }
}
