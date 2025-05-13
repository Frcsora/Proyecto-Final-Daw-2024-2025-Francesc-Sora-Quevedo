<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Games;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
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
        $gamesvar = Games::all();
        $socialmedias = Socialmedia::with('medias')->get();        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('games.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'gamesvar'=>$gamesvar, 'socialmedias'=>$socialmedias]);
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
        $socialmedias = Socialmedia::with('medias')->get();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('games.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|max:255']);
        Games::create($request->all());
        return redirect()->route('games.index')->with('status', 'Juego agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Games $games)
    {
        return redirect()->route('news.index');
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
        $game = Games::findOrFail($id);
        $socialmedias = Socialmedia::with('medias')->get();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('games.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'game'=>$game, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required|string|max:255']);
        Games::findOrFail($id)->update(['name' => $request->name]);
        return redirect()->route('games.index')->with('status', 'Tag actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Games::findOrFail($id)->delete();
        return redirect()->route('games.index')->with('status', 'Tag eliminado');
    }
}
