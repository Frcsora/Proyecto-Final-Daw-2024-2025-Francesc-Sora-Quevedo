<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\TwitterHelper;
use App\Helpers\UserValidator;
use App\Models\Games;
use App\Models\Images;
use App\Models\Player;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Tags;
use App\Models\Teams;
use App\Models\TeamsMedias;
use App\Models\Tournaments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Teams::with('games')->get();
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

        return view('teams.index', ['sponsors'=>$sponsors, 'tweets'=>$tweets,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'teams'=>$teams, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(UserValidator::ValidateAdmin()){
            if(session()->has('teams')){
                $teams = session()->get('teams');
            }else{
                $teams = Teams::all();
                session()->put('teams', $teams);
            }
            $games = Games::all();
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
            return view('teams.create', ['teams' => $teams,'games'=>$games, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'created_by' => 'required|int|exists:users,id',
        ]);
        Teams::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Equipo creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
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
        if(session()->has('sponsors')){
            $sponsors = session()->get('sponsors');
        }else{
            $sponsors = Sponsor::orderBy('tier', 'desc')->get();
            session()->put('sponsors', $sponsors);
        }
        $games = Games::all();
        $team = Teams::where('id', $id)->with('games')->first();
        $medias = TeamsMedias::where('team_id', $id)->with('medias')->get();
        $medias = SanitizeSVG::sanitizeSVG($medias);
        $players = Player::where('team_id', $id)->get();
        $tweets = TwitterHelper::getTweets();
        $tournaments = Tournaments::where('team_id', $id)->get();
        session() -> put('team_id', $team->id);
        return view('teams.show', ['teams' => $teams, 'tournaments' => $tournaments, 'tweets' => $tweets,'sponsors' => $sponsors, 'players' => $players,'medias'=>$medias,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'games'=>$games, 'socialmedias'=>$socialmedias, 'team'=>$team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(UserValidator::ValidateAdmin()){
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
            $team = Teams::findOrFail($id);
            $games = Games::all();
            if(session()->has('teams')){
                $teams = session()->get('teams');
            }else{
                $teams = Teams::all();
                session()->put('teams', $teams);
            }
            return view('teams.edit', ['teams'=> $teams,'team' => $team,'games' => $games,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'created_by' => 'required|int|exists:users,id',
        ]);
        Teams::findOrFail($id)->update($request->all());
        return redirect()->route('teams.index')->with('success', 'Equipo actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Teams::findOrFail($id)->delete();
        return redirect()->route('teams.index')->with('success', 'Equipo eliminado satisfactoriamente');
    }
}
