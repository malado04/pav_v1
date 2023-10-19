<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    // protected $redirectTo = '/home';
    protected function redirectTo()
    {
        if (auth()->user()->admin == 0) {
            return '/home';
        }

        if (auth()->user()->admin == 1) {
            return '/home_douanier';
        }

        if (auth()->user()->admin == 2) {
            return '/home_impot';
        }

        if (auth()->user()->admin == 3) {
            return '/home_mine';
        }
        if (auth()->user()->admin == 4) {
            return '/home_client';
        }
        
        if (auth()->user()->admin == 5) {
            return '/home_duc';
        }
        
        // return '/home';
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}