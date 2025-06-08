<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\TwitterHelper;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Matches;
use App\Models\News;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Tags;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            $tagsvar = Tags::all();
            return view('tags.index', ['teams' => $teams,'tagsvar' => $tagsvar,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
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
            return view('tags.create', ['teams' => $teams,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
        $request->validate(['tag'=>'required|string|max:255']);
        Tags::create($request->all());
        return redirect()->route('tags.index')->with('status', 'Tags agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
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
        if(session()->has('sponsors')){
            $sponsors = session()->get('sponsors');
        }else{
            $sponsors = Sponsor::orderBy('tier', 'desc')->get();
            session()->put('sponsors', $sponsors);
        }
        $newsvar = News::whereHas('tags', function ($query) use ($id) {
            $query->where('tag_id', $id);
        })->with('user')->paginate(3);
        $tweets = TwitterHelper::getTweets();
        $matchesBefore = Matches::whereIn('result', ['Victoria','Empate','Derrota'])
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        $matchesAfter = Matches::where('result', 'Pendiente')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        return view('news.index', ['matchesBefore'=>$matchesBefore, 'matchesAfter' => $matchesAfter, 'teams' => $teams, 'sponsors' => $sponsors, 'tweets' => $tweets, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);

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
            $tag = Tags::findOrFail($id);
            return view('tags.edit', ['teams'=>$teams,'tag'=>$tag,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
