<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\User;

class ContactController extends Controller
{
    public function index()
    {
        return view('home.contact');
    }

    public function confirmation(Request $request)
    {


    }


}
