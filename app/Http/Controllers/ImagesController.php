<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Models\Images;
use App\Models\Socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UserValidator;
class ImagesController extends Controller
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
        $logos = Images::where('type', 'logo')->get();
        $fondos = Images::where('type', 'fondo')->get();
        $socialmedias = Socialmedia::all();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        UserValidator::validateAdmin();
        return view('images.index', ['image'=>$image->base64,'imageFondo'=>$imageFondo->base64, 'logos'=>$logos, 'fondos'=>$fondos, 'socialmedias'=>$socialmedias]);
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

        UserValidator::validateAdmin();

        return view('images.create', ['image'=>$image->base64, 'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255'
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
        $imagen = Images::findOrFail($id);
        $image = $imagen -> type == 'logo' ? $imagen : Images::where('type', 'logo')->where('active', 'true')->first();

        $imageFondo = $imagen -> type == 'fondo' ? $imagen : Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        $socialmedias = Socialmedia::all();
        UserValidator::validateAdmin();
        return view('images.show', ['image'=>$image->base64, 'imageFondo'=>$imageFondo->base64, 'socialmedias'=>$socialmedias]);
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
        if($request->type == 'logo'){
            $logos = Images::where('type', 'logo')->get();
            foreach($logos as $logo){
                if($id == $logo->id){
                    Images::findOrFail($logo->id)->update(['active' => 'true']);
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
    public function destroy(string $id)
    {
        Images::findOrFail($id)->delete();
        return redirect()->route('images.index')->with('status', 'Imagen eliminada');
    }
}
