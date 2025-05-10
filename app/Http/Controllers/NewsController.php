<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\News;
use App\Models\NewsTags;
use App\Models\Socialmedia;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\Images;
use App\Models\News;
use App\Models\NewsTags;
use App\Models\Tags;
use Illuminate\Http\Request;
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")

class NewsController extends Controller
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
        $newsvar = News::with(['user','tags'])->orderBy('created_at','desc')->get();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('news.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        $newsvar = News::with(['user','tags'])->orderBy('created_at','desc')->get();

        return view('news.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar]);
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
        $tags = Tags::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('news.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tags'=>$tags, 'socialmedias'=>$socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        $tags = Tags::all();
        return view('news.create', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'tags'=>$tags]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['id_user' => 'required',
<<<<<<< HEAD
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
=======
            'image' => 'required',
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
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

<<<<<<< HEAD
        return redirect()->route('news.index')->with('status', 'Noticia agregada');
=======
        return redirect()->route('news.index');
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
        $newsvar = News::with(['user','tags'])->findOrFail($id);
        $socialmedias = Socialmedia::all();
        UserValidator::validateAdmin();
        return view('news.show', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar, 'socialmedias'=>$socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        $newsvar = News::with(['user','tags'])->findOrFail($id);
        return view('news.show', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'newsvar'=>$newsvar]);
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
        $newsvar = News::with(['user','tags'])->findOrFail($id);
        $alltags = Tags::all();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('news.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, "newsvar"=>$newsvar,"alltags"=>$alltags, 'socialmedias'=>$socialmedias]);
=======
        $image = Images::findOrFail(1);
        $imageFondo = Images::findOrFail(2);
        $newsvar = News::with(['user','tags'])->findOrFail($id);
        $alltags = Tags::all();
        return view('news.edit', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, "newsvar"=>$newsvar,"alltags"=>$alltags]);
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
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
            if($tag != ""){
                NewsTags::create(['news_id' => $id, 'tag_id' => $tag]);
            }
        }
        return redirect() -> route('news.show',$id)->with('status', 'Noticia actualizada');
=======
    public function update(Request $request, News $news)
    {
        //
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        NewsTags::where('news_id', $id)->delete();
        return redirect()->route('news.index')->with('status', 'Noticia eliminada');
=======
    public function destroy(News $news)
    {
        //
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }
}
