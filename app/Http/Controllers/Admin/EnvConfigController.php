<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Config\EnvConfig;

use Response;
use Cache;
use Artisan;



class EnvConfigController extends Controller
{
    public function index()
    {
        $envConfig = envConfig::all();

        $setbool = array(
            'true' => 'true',
            'false' => 'false'
        );

        $setenv = array(
            'local' => 'local',
            'production' => 'production'
        );

        $captchapos = array(
            'bottomright' => 'bottomright',
            'bottomleft' => 'bottomleft',
            'inline' => 'inline'
        );


        return view('admin.env', compact('envConfig', 'setbool', 'setenv', 'captchapos'));
    }

    public function update(Request $request)
    {
        $envConfig = envConfig::find($request->id);
        $envConfig->value = $request->value;
        $envConfig->save();

        //rewrite .env file
        if ($envConfig->variable == "APP_NAME" ||
            $envConfig->variable ==  "MAIL_FROM_NAME"
        ) {
            $envConfig->value = "\"$envConfig->value\"";
        }

        $values = array(
            $envConfig->variable => $envConfig->value
            );
        $this->setEnvironmentValue($values);

        //Artisan::call('config:clear');

        return Response::json( array(
            'success'    => true
        ));
    }


    public function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        $str .= "\r\n";
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {

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
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        app()->loadEnvironmentFrom($envFile);

        return true;
    }


}
