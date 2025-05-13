<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Models\Images;
use App\Models\Socialmedia;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $socialmedias = Socialmedia::with('medias')->get();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        return view('aboutus', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
    }
}
