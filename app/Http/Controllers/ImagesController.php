<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\Teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UserValidator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ImagesController extends Controller
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
        };
        $logos = Images::where('type', 'logo')->get();
        $fondos = Images::where('type', 'fondo')->get();
        if(UserValidator::validateAdmin()){
            return view('images.index', ['teams' => $teams,'logos' => $logos, 'fondos' => $fondos, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
        if(UserValidator::validateAdmin()){
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
            };
            if(session()->has('teams')){
                $teams = session()->get('teams');
            }else{
                $teams = Teams::all();
                session()->put('teams', $teams);
            }

            return view('images.create', ['teams' => $teams,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|max:255',
            'type' => ['required', 'in:logo,fondo'],
            'created_by' => 'required|int|exists:users,id',

        ]);
        $base64 = $request->image;
        $name = $request->name;
        $type = $request ->type;
        $created_by = $request->created_by;
        Images::create(['created_by'=> $created_by,'base64'=>$base64,'name'=>$name,'type'=>$type]);
        return redirect()->route('images.index')->with('status', 'Imagen agregada');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(UserValidator::validateAdmin()){
            if(session()->has('teams')){
                $teams = session()->get('teams');
            }else{
                $teams = Teams::all();
                session()->put('teams', $teams);
            }
            $image = Images::findOrFail($id);
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
            return view('images.show', ['teams' => $teams,'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
        }
        else{
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return redirect()->route('news.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|max:255',
            'type' => ['required', 'in:logo,fondo'],
            'created_by' => 'required|int|exists:users,id',

        ]);
        if($request->type == 'logo'){
            $logos = Images::where('type', 'logo')->get();
            foreach($logos as $logo){
                if($id == $logo->id){
                    Images::findOrFail($logo->id)->update(['active' => 'true']);
                    session()->put('image', $logo);
                }else{
                    Images::findOrFail($logo->id)->update(['active' => 'false']);
                }
            }
        }

        if($request->type == 'fondo'){
            $fondos = Images::where('type', 'fondo')->get();
            foreach($fondos as $fondo){
                if($id == $fondo->id){
                    Images::findOrFail($fondo->id)->update(['active' => 'true']);
                    session()->put('imageFondo', $fondos);
                }else{
                    Images::findOrFail($fondo->id)->update(['active' => 'false']);
                }
            }
        }
        return redirect()->route('images.index')->with('status', 'Imagen actualizada');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Images::findOrFail($id)->delete();
        return redirect()->route('images.index')->with('status', 'Imagen eliminada');
    }
}
