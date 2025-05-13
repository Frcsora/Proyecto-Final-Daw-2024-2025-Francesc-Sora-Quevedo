<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\News;
use App\Models\Socialmedia;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TagsController extends Controller
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
            $tagsvar = Tags::all();
            $socialmedias = Socialmedia::all();
            $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
            UserValidator::validateAdmin();
            return view('tags.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tagsvar'=>$tagsvar, 'socialmedias'=>$socialmedias]);

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
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('tags.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['tag'=>'required|string|max:255']);
        Tags::create($request->all());
        return redirect()->route('tags.index')->with('status', 'Tags agregado correctamente');
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
        $newsvar = News::whereHas('tags', function ($query) use ($id) {
            $query->where('tags.id', $id);
        })->orderBy('created_at', 'desc')->get();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('tags.show', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);
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
        $tag = Tags::findOrFail($id);
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('tags.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tag'=>$tag, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate(['tag'=>'required|string|max:255']);
        Tags::findOrFail($id)->update(['tag' => $request->tag]);
        return redirect()->route('tags.index')->with('status', 'Tag actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tags::findOrFail($id)->delete();
        return redirect()->route('tags.index')->with('status', 'Tag eliminado');
    }
}
