<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authController extends Controller
{
    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
