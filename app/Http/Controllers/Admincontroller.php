<?php

namespace App\Http\Controllers;

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        if(Auth::check() && Auth::user()->role == 'admin' || Auth::user()->role ==  'superadmin'){
            return view('/administracion', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64]);
        }
        return redirect(route('news.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64]));
    }
}
