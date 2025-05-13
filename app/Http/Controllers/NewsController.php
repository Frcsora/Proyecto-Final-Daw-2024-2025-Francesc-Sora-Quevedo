<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\News;
use App\Models\NewsTags;
use App\Models\Socialmedia;
use App\Models\Tags;
use App\View\Components\cardDiv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
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
        $newsvar = News::with(['user','tags'])->orderBy('created_at','desc')->get();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('news.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);
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
        $tags = Tags::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('news.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tags'=>$tags, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['id_user' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image' => 'required',
            'title' => 'required|string|max:255',
            'abstract' => 'required|string|max:255',
            'news' => 'required']);
        $userid = $request->get('id_user');
        $image = $request->get('image');
        $title = $request->get('title');
        $abstract = $request->get('abstract');
        $text = $request->get('news');
        $tags = explode("-", $request->get('taginput'));
        News::create(['created_by' => $userid, 'image' => $image, 'title' => $title, 'abstract' => $abstract, 'text' => $text]);
        $newsid = News::all()->last()->id;
        if(isset($tags)){
            foreach ($tags as $tag) {
                if($tag != ""){
                    NewsTags::create(['news_id' => $newsid, 'tag_id' => $tag]);
                }
            }
        }

        return redirect()->route('news.index')->with('status', 'Noticia agregada');
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
        $newsvar = News::with(['user','tags'])->findOrFail($id);
        $socialmedias = Socialmedia::all();
        UserValidator::validateAdmin();
        return view('news.show', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);
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
        $newsvar = News::with(['user','tags'])->findOrFail($id);
        $alltags = Tags::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('news.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, "newsvar"=>$newsvar,"alltags"=>$alltags, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate(['id_user' => 'required',
            'image' => 'required',
            'title' => 'required|string|max:255',
            'abstract' => 'required|string|max:255',
            'news' => 'required']);
        $userid = $request->get('id_user');
        $image = $request->get('image');
        $title = $request->get('title');
        $abstract = $request->get('abstract');
        $text = $request->get('news');
        $tags = explode("-", $request->get('taginput'));


        News::findOrFail($id)->update(['created_by' => $userid, 'image' => $image, 'title' => $title, 'abstract' => $abstract, 'text' => $text]);
        NewsTags::where('news_id', $id)->delete();

        foreach ($tags as $tag) {
            if ($tag != "") {
                NewsTags::create(['news_id' => $id, 'tag_id' => $tag]);
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
