<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\TwitterHelper;
use App\Models\Images;
use App\Models\Matches;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Teams;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $matchesBefore = Matches::whereIn('result', ['Victoria','Empate','Derrota'])
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        $matchesAfter = Matches::where('result', 'Pendiente')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();

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
        if(session()->has('sponsors')){
            $sponsors = session()->get('sponsors');
        }else{
            $sponsors = Sponsor::orderBy('tier', 'desc')->get();
            session()->put('sponsors', $sponsors);
        }
        $tweets = TwitterHelper::getTweets();
        if(session()->has('teams')){
            $teams = session()->get('teams');
        }else{
            $teams = Teams::all();
            session()->put('teams', $teams);
        }
        return view('aboutus', ['matchesBefore'=>$matchesBefore, 'matchesAfter' => $matchesAfter,'teams' => $teams, 'sponsors'=>$sponsors, 'tweets' => $tweets,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
    }
}
