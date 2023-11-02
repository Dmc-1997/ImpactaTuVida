<?php

namespace App\Http\Controllers\Tools;
use App\Http\Controllers\Controller;

use Maatwebsite\Excel\Facades\Excel;

/*Clase que importa*/
use App\Imports\UsersImport;

class ImportFromExcelController extends Controller
{
    public function importUsers($name)
    {
        Excel::import(new UsersImport, 'importar/'.$name);
        flash('usuarios importados')->success();

        return redirect()->route('businesses.users');

    }

}
