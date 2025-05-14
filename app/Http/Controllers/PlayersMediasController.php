<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Medias;
use App\Models\PlayersMedias;
use App\Models\Socialmedia;
use App\Models\TeamsMedias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayersMediasController extends Controller
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
        UserValidator::validateAdmin();
        return view('playersmedias.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'medias'=>$medias, 'id' => $request->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {$request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url|max:255'
        ]);
        $playerid = $request->player_id;
        $media = explode('-',$request->media)[0];
        $name = $request->name;
        $link = $request->link;
        PlayersMedias::create(['player_id'=>$playerid ,'media_id'=>$media, 'name' => $name, 'link'=>$link]);
        return redirect()->route('players.show', $playerid)->with('status', 'Red social creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayersMedias $players_Medias)
    {
        return redirect()->route('news.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
        $socialmediaEdit = PlayersMedias::findOrFail($id);
        $medias = Medias::all();
        UserValidator::validateAdmin();
        return view('playersmedias.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'medias'=>$medias, 'socialmediaEdit'=>$socialmediaEdit]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url|max:255'
        ]);
        $media = explode('-',$request->media)[0];
        $name = $request->name;
        $link = $request->link;
        PlayersMedias::findOrFail($id)->update(['id_media'=>$media, 'name' => $name, 'link'=>$link]);
        return redirect()->route('players.show', $id)->with('status', 'Red social actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PlayersMedias::findOrFail($id)->delete();
        return redirect()->route('players.show', $id)->with('status', 'Red social borrada');
    }
}
