<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\Teams;
use App\Models\Tournaments;
use Illuminate\Http\Request;

class TournamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort(404);
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
            $teams = Teams::all();
            return view('tournaments.create',  ['teams' => $teams, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'event' => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:2025-01-01',
            'time' => 'required|date_format:H:i',
        ]);
        Tournaments::create($request->all());
        return redirect()->route('teams.show', $request->team_id)->with('status', 'Torneo creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournaments $tournaments)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
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
            $tournament = Tournaments::findOrFail($id);
            return view('tournaments.edit',  ['tournament' => $tournament ,'teams' => $teams, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'event' => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:2025-01-01',
            'time' => 'required|date_format:H:i:s',
            'result' => 'int|min:1'
        ]);
        Tournaments::findOrFail($id)->update($request->all());
        return redirect()->route('teams.show', $request->team_id)->with('status', 'Torneo actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tournaments::findOrfail($id)->delete();
        return redirect()->back()->with('status', 'Torneo eliminado satisfactoriamente');
    }
}
