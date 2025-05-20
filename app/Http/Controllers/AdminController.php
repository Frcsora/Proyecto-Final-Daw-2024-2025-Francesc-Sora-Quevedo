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
       if(UserValidator::ValidateAdmin()){
           if(session()->has('teams')){
               $teams = session()->get('teams');
           }else{
               $teams = Teams::all();
               session()->put('teams', $teams);
           }
           if(session()->has('image')){
               $image = session()->get('image');
           }else{
               $image = Images::where('type', 'logo')
                   ->where('active', 'true')->first();
               session()->put('image', $image);
           }
           if(session()->has('socialmedia')){
               $socialmedias = session()->get('socialmedia');
           }else{
               $socialmedias = Socialmedia::with('medias')->get();
               $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
               session()->put('socialmedias', $socialmedias);
           }
           if(session()->has('imageFondo')){
               $imageFondo = session()->get('imageFondo');
           }else{
               $imageFondo = Images::where('type', 'fondo')
                   ->where('active', 'true')->first();
           }
           return view('administracion', ['teams'=>$teams ,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }
}
