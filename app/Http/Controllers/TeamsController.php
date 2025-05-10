<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Games;
use App\Models\Images;
use App\Models\Player;
use App\Models\Socialmedia;
use App\Models\Tags;
use App\Models\Teams;
use App\Models\TeamsMedias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $teams = Teams::with('games')->get();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        return view('teams.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'teams'=>$teams, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $games = Games::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('teams.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'games'=>$games, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        Teams::create($request->all());
        return redirect()->route('teams.index')->with('success', 'Equipo creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $games = Games::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        $team = Teams::where('id', $id)->with('games')->first();
        $medias = TeamsMedias::where('team_id', $id)->with('medias')->get();
        $medias = SanitizeSVG::sanitizeSVG($medias);
        $players = Player::where('team_id', $id)->get();
        return view('teams.show', ['players' => $players,'medias'=>$medias,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'games'=>$games, 'socialmedias'=>$socialmedias, 'team'=>$team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $team = Teams::findOrFail($id);
        $games = Games::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('teams.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'games'=>$games, 'socialmedias'=>$socialmedias, 'team'=>$team]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
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
