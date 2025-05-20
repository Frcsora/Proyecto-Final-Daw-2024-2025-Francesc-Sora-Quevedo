<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Helpers\UserValidator;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\Sponsor;
use App\Models\Teams;
use Illuminate\Http\Request;

class SponsorController extends Controller
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
            $sponsors = Sponsor::orderBy('tier', 'desc')->get();
            return view('sponsors.index', ['teams'=>$teams,'sponsors' => $sponsors, 'image'=>$image->base64,'imageFondo'=>$imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            return view('sponsors.create', ['teams'=>$teams, 'image' => $image->base64,'imageFondo' => $imageFondo->base64,'socialmedias'=>$socialmedias]);
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
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'tier' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'created_by' => 'required|int|exists:users,id',
        ]);
        Sponsor::create([
            'created_by' => $request->created_by,
            'name' => $request['name'],
            'link' => $request['link'],
            'tier' => $request['tier'],
            'base64' => $request['image'],
        ]);
        session()->put('sponsors', Sponsor::orderBy('tier', 'desc')->get());
        return redirect()->route('sponsors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        abort(404);
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
            $sponsor = Sponsor::findOrFail($id);
            return view('sponsors.edit', ['teams' =>$teams,'sponsor' => $sponsor,'image' => $image->base64,'imageFondo' => $imageFondo->base64,'socialmedias'=>$socialmedias]);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required|url',
            'tier' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'created_by' => 'required|int|exists:users,id',
        ]);
        Sponsor::findOrFail($id)->update([
            'created_by' => $request->created_by,
            'name' => $request['name'],
            'link' => $request['link'],
            'tier' => $request['tier'],
            'base64' => $request['image'],
        ]);
        session()->put('sponsors', Sponsor::orderBy('tier', 'desc')->get());
        return redirect()->route('sponsors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Sponsor::findOrFail($id)->delete();
        session()->put('sponsors', Sponsor::orderBy('tier', 'desc')->get());
        return redirect()->route('sponsors.index');
    }
}
