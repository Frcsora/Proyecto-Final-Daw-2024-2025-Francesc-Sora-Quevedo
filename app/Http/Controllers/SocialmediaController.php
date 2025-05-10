<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Medias;
use App\Models\Socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialmediaController extends Controller
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
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('socialmedia.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
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
        $medias = Medias::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('socialmedia.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'medias'=>$medias]);
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
        $request->validate(['media'=>'required']);
        $media = $request->media;
        $name = $request->name;
        $link = $request->link;
        Socialmedia::create(['id_media'=>$media, 'name' => $name, 'link'=>$link]);
        return redirect()->route('socialmedia.index')->with('status', 'Red social creada');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return redirect()->route("news.index");
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
        $socialmediaEdit = Socialmedia::findOrFail($id);
        $medias = Medias::all();
        UserValidator::validateAdmin();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        return view('socialmedia.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias, 'medias'=>$medias, 'socialmediaEdit'=>$socialmediaEdit]);
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
        Socialmedia::findOrFail($id)->update(['id_media'=>$media, 'name' => $name, 'link'=>$link]);
        return redirect()->route('socialmedia.index')->with('status', 'Red social actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Socialmedia::findOrFail($id)->delete();
        return redirect()->route('socialmedia.index')->with('status', 'Red social borrada');
    }
}
