<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Config\StoreConfig;
use App\Http\Controllers\Controller;

class StoreConfigController extends Controller
{
    public function index()
    {
        $storeconfigs = StoreConfig::all();
        return view('admin.storeconfig.index',compact('storeconfigs'));
    }

    public function edit(Request $request)
    {

        $config = StoreConfig::findOrFail($request->id);
        $config->fill($request->all());
        $config->save();

        return response()->json($config);
    }

    public function logo()
    {
        return view('admin.storeconfig.logo');
    }

    public function update(Request $request, $id)
    {
        if ($id==0) {
            $name = 'logo.png';
            $path = public_path().'/imagenes/logos/';
            if($request->hasFile('image')) {
                if(file_exists($path.$name)){
                    unlink($path.$name);
                }
                $file = $request->file('image');
                $file->move($path,$name);
                flash('Logo editado correctamente')->success();
            }
        }

        if ($id==1) {
            $name = 'background.png';
            $path = public_path().'/imagenes/logos/';
            if($request->hasFile('image')) {
                if(file_exists($path.$name)){
                    unlink($path.$name);
                }
                $file = $request->file('image');
                $file->move($path,$name);
                flash('fondo editado correctamente')->success();
            }
        }

        return redirect()->route('admin.store.config.logo');

    }


}
