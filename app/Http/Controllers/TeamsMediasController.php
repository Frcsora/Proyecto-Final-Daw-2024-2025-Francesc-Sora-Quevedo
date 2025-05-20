<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Medias;
use App\Models\Socialmedia;
use App\Models\TeamsMedias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamsMediasController extends Controller
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
    public function create(Request $request)
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
            $medias = Medias::all();
            return view('teamsmedias.create', ['teams' => $teams,'medias' => $medias, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'link' => 'required|url|max:255',
            'team_id' => 'required|int|exists:teams,id',
            'media_id' => 'required|int|exists:medias,id',
        ]);
        $teamid = $request->team_id;
        $media = $request->media;
        $name = $request->name;
        $link = $request->link;
        TeamsMedias::create(['team_id'=>$teamid ,'media_id'=>$media, 'name' => $name, 'link'=>$link]);
        return redirect()->route('teams.index')->with('status', 'Red social creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeamsMedias $teamsMedias)
    {
        return redirect()->route('news.index');
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
            $socialmediaEdit = TeamsMedias::findOrFail($id);
            $medias = Medias::all();
            return view('teamsmedias.edit', ['teams' => $teams,'socialmediaedit' => $socialmediaEdit, 'medias' => $medias, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'link' => 'required|url|max:255'
        ]);
        $media = $request->media;
        $name = $request->name;
        $link = $request->link;
        TeamsMedias::findOrFail($id)->update(['id_media'=>$media, 'name' => $name, 'link'=>$link]);
        return redirect()->route('teams.show', $id)->with('status', 'Red social actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TeamsMedias::findOrFail($id)->delete();
        return redirect()->route('teams.show', $id)->with('status', 'Red social borrada');
    }
}
