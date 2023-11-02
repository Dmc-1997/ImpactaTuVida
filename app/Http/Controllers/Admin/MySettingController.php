<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Config\MySetting;
use App\Models\Config\Currency;
use App\Models\Taxes\Tax;

class MySettingController extends Controller
{
    /**
     * Menú de configuraciones generales
    */
    public function index()
    {
        return view('admin.mysettings.index');
    }

    /**
     * Editar configuracion
     */
    public function edit()
    {
        $mysettings = MySetting::find(1);

        $currencies = Currency::OrderBy('name', 'asc')->pluck('name', 'id');
        $taxes = Tax::pluck('detail', 'id');

        return view('admin.mysettings.edit', compact('mysettings', 'currencies', 'taxes'));
    }

    /**
     * Editar logo
     */
    public function logo()
    {
        $mysettings = MySetting::find(1);

        return view('admin.mysettings.logo', compact('mysettings'));
    }

    /**
     * Actualizar  datos de la configuracion
     *
     */
    public function update(Request $request, $id)
    {
        $setting = MySetting::find($id);
        $name = $setting->logo;
        $setting->fill($request->all());

        $path = public_path().'/imagenes/logos/';
        if ($request->hasFile('logo')) {
            if(is_null($name) || $name == '' || $name == 'default.jpg'){

            } else {
                if(file_exists($path.$name)){
                    unlink($path.$name);
                }
            }
            $file = $request->file('logo');
            $name = 'logo_'.time().'.'.$file->getClientOriginalExtension();
            $file->move($path,$name);

            //$image_resize = Image::make($path.$name);
            //$image_resize->resize(800, 800);
            //$image_resize->save($path.$name);
        }

        $setting->logo = $name;

        $setting->save();
        flash('Datos actualizados')->success();
        return redirect()->route('admin.mysettings.index');
    }

    /**
     * Eliminar logo
     *
     */
    public function destroyLogo()
    {
        $setting = MySetting::find(1);
        $name = $setting->logo;
        $setting->logo = 'default.jpg';

        $path = public_path().'/imagenes/logos/';
        if (file_exists($path.$name)) {
            unlink($path.$name);
            $setting->save();
        }

        flash('Datos actualizados' )->success();
        return redirect()->route('admin.mysettings.index');
    }

    function checkPermissionsToThisCourseForTeams($user, $course, $allow)
    {
        if ($allow) {
            if ($course->team_allow == '0') {
                $allow = 1;
            } else {
                $team_allow = explode(",", $course->team_allow);
                if (in_array($user->current_team_id, $team_allow)) {
                    $allow = 1;
                } else {
                    $allow = 0;
                }
            }
        }
        return $allow;
    }

}
