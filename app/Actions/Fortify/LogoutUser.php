<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutUser
{
    public function __invoke(Request $request)
    {
        // Your custom logout logic here, e.g., adding session time

        // Optionally, you can log the user out using Laravel's built-in functionality
        //auth()->guard('web')->logout();

        // Return Fortify's default logout response
        //return app(LogoutResponseContract::class);
    }
}


