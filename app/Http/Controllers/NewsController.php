<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\TwitterHelper;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Matches;
use App\Models\News;
use App\Models\NewsTags;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Tags;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
        $newsvar = News::with(['user','tags'])->orderBy('created_at','desc')->limit(4)->get();
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
            $tags = Tags::all();
            return view('news.create', ['teams' => $teams,'tags' => $tags, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'id_user' => 'required|int|exists:users,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image' => 'required',
            'title' => 'required|string|max:100',
            'abstract' => 'required|string|max:255',
            'news' => 'required|string'
        ]);

        $userid = $request->get('id_user');
        $image = $request->get('image');
        $title = $request->get('title');
        $abstract = $request->abstract;
        $text = $request->news;
        $tags = explode("-", $request->get('taginput'));
        News::create(['created_by' => $userid, 'image' => $image, 'title' => $title, 'abstract' => $abstract, 'text' => $text]);
        $newsid = News::all()->last()->id;
        if(isset($tags)){
            $tagIDs = Tags::all('id');
            foreach ($tags as $tag) {

                if($tag != "" && in_array($tag, $tagIDs->id)){
                    NewsTags::create(['news_id' => $newsid, 'tag_id' => $tag]);
                }
            }
        }
        $tagString = "";
        $tags = NewsTags::where('news_id', $newsid)->with("tags")->get();
        foreach ($tags as $tag) {
            $tagString .= "#" . $tag->tags->tag . " ";
        }
        $tweetText = "¡Entra a ver nuestra ultima notícia!: " . $title . " " . route('news.show', $newsid). " " . $tagString;
        session()->put('tweetText', $tweetText);

        return redirect()->route('twitter.redirect');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $matchesBefore = Matches::whereIn('result', ['Victoria','Empate','Derrota'])
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
        $matchesAfter = Matches::where('result', 'Pendiente')
            ->orderBy('date', 'desc')
            ->limit(5)
            ->get();
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
        $tweets = TwitterHelper::getTweets();

        $newsvar = News::with(['user','tags'])->findOrFail($id);
        return view('news.show', ['matchesBefore'=>$matchesBefore, 'matchesAfter' => $matchesAfter, 'teams'=>$teams, 'sponsors'=>$sponsors,'tweets'=> $tweets, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(UserValidator::ValidateAdmin()){
            $newsvar = News::with(['user','tags'])->findOrFail($id);
            $alltags = Tags::all();
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
            return view('news.edit', ['teams'=>$teams,'newsvar' => $newsvar, 'alltags' => $alltags, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'id_user' => 'required|int|exists:users,id',
            'image' => 'required',
            'title' => 'required|string|max:255',
            'abstract' => 'required|string|max:255',
            'news' => 'required|string'
        ]);
        $userid = $request->get('id_user');
        $image = $request->get('image');
        $title = $request->get('title');
        $abstract = $request->get('abstract');
        $text = $request->get('news');
        $tags = explode("-", $request->get('taginput'));


        News::findOrFail($id)->update(['created_by' => $userid, 'image' => $image, 'title' => $title, 'abstract' => $abstract, 'text' => $text]);
        NewsTags::where('news_id', $id)->delete();

        if(isset($tags)){
            $tagIDs = Tags::all('id');
            foreach ($tags as $tag) {
                if($tag != "" && in_array($tag, $tagIDs->id)){
                    NewsTags::create(['news_id' => $id, 'tag_id' => $tag]);
                }
            }
        }
        return redirect()->route('news.show', $id)->with('status', 'Noticia actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        NewsTags::where('news_id', $id)->delete();
        return redirect()->route('news.index')->with('status', 'Noticia eliminada');
    }
}
