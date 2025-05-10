<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\TeamsMedias;
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
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('administracion', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
    }
}
