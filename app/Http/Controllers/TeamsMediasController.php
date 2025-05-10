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
        return redirect()->route('news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $medias = Medias::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('teamsmedias.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'medias'=>$medias, 'id' => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url|max:255'
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
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $socialmedias = Socialmedia::all();
        $socialmediaEdit = TeamsMedias::findOrFail($id);
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        $medias = Medias::all();
        return view('playersmedias.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'medias'=>$medias, 'socialmediaEdit'=>$socialmediaEdit]);
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
