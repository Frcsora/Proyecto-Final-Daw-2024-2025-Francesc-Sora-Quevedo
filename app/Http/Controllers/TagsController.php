<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\News;
use App\Models\Socialmedia;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\Images;
use App\Models\News;
use App\Models\Tags;
use Illuminate\Http\Request;
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
<<<<<<< HEAD
            $image = Images::where('type', 'logo')
                ->where('active', 'true')->first();
            $imageFondo = Images::where('type', 'fondo')
                ->where('active', 'true')->first();
            $tagsvar = Tags::all();
            $socialmedias = Socialmedia::all();
            $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
            UserValidator::validateAdmin();
            return view('tags.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tagsvar'=>$tagsvar, 'socialmedias'=>$socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        $tagsvar = Tags::all();
        return view('tags.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tagsvar'=>$tagsvar]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
<<<<<<< HEAD
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('tags.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        return view('tags.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['tag'=>'required|string|max:255']);
        Tags::create($request->all());
<<<<<<< HEAD
        return redirect()->route('games.index')->with('status', 'Tags agregado correctamente');
=======
        return redirect()->route('tags.index')->with('status', 'Tags agregado correctamente');
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
<<<<<<< HEAD
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
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        $newsvar = News::whereHas('tags', function ($query) use ($id) {
            $query->where('tags.id', $id);
        })->orderBy('created_at', 'desc')->get();
        return view('tags.show', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
<<<<<<< HEAD
        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $tag = Tags::findOrFail($id);
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();

        return view('tags.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tag'=>$tag, 'socialmedias'=>$socialmedias]);
=======
        $tag = Tags::findOrFail($id);
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        return view('tags.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tag'=>$tag]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
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
