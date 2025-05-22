<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\TwitterHelper;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Matches;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Teams;
use App\Models\Tournaments;
use Illuminate\Http\Request;

class MatchesController extends Controller
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
        if(UserValidator::validateAdmin()){
            if(session()->has('sponsors')){
                $sponsors = session()->get('sponsors');
            }else{
                $sponsors = Sponsor::orderBy('tier', 'desc')->get();
                session()->put('sponsors', $sponsors);
            }
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
            $tweets = TwitterHelper::getTweets();
            return view('matches.create',  ['tweets' => $tweets,'sponsors' =>$sponsors,'teams' => $teams, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);

        }else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:2025-01-01',
            'time' => 'required|date_format:H:i',
            'rival' => 'required|string|max:255',
            'best_of' => ['required','in:BO1,BO3,BO5:'],
        ]);
        $date = $request->input('date');
        $time = $request->input('time');
        $tournament_id = session()->get('tournament_id');
        $rival = $request->input('rival');
        $best_of = $request->input('best_of');

        Matches::create(['date' => $date, 'time' => $time, 'tournaments_id' => $tournament_id, 'rival' => $rival, 'best_of' => $best_of]);
        return redirect() -> route('tournaments.show', $tournament_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Matches $matches)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(UserValidator::validateAdmin()){
            if(session()->has('sponsors')){
                $sponsors = session()->get('sponsors');
            }else{
                $sponsors = Sponsor::orderBy('tier', 'desc')->get();
                session()->put('sponsors', $sponsors);
            }
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
            $tweets = TwitterHelper::getTweets();
            $match = Matches::findOrFail($id);
            return view('matches.edit',  ['match' => $match,'tweets' => $tweets,'sponsors' =>$sponsors,'teams' => $teams, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);

        }else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:2025-01-01',
            'time' => 'required|date_format:H:i:s',
            'rival' => 'required|string|max:255',
            'best_of' => ['required','in:BO1,BO3,BO5'],
            'result' => ['required','in:Pendiente,Victoria,Empate,Derrota'],
        ]);
        $date = $request->input('date');
        $time = $request->input('time');
        $tournament_id = session()->get('tournament_id');
        $rival = $request->input('rival');
        $best_of = $request->input('best_of');
        $result = $request->input('result');
        Matches::findOrFail($id)->update(['date' => $date, 'time' => $time, 'tournaments_id' => $tournament_id, 'rival' => $rival, 'best_of' => $best_of, 'result'=>$result]);
        return redirect() -> route('tournaments.show', $tournament_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Matches::findOrFail($id)->delete();
        return redirect() -> route('tournaments.show', session()->get('tournament_id'));
    }
}
