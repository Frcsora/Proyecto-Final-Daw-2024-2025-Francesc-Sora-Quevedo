<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class UserValidator
{
    public static function validateUser(){
        if(!Auth::check()){
            return Redirect()->route('news.index');
        }
        return true;
    }
    public static function validateAdmin(){
        if (Auth::check())
        {
            if(in_array(Auth::user()->role, ['admin', 'superadmin'])){
                return true;
            }

        }

        return false;
    }
}
