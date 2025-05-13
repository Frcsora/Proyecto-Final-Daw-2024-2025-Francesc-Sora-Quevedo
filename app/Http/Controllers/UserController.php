<?php

namespace App\Http\Controllers;

use App\Helpers\SanitizeSVG;
use App\Models\Images;
use App\Models\Socialmedia;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $socialmedias = Socialmedia::with('medias')->get();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        $users = User::all();
        return view('users.index', ['image' => $image->base64, 'imageFondo' => $imageFondo->base64, 'socialmedias' => $socialmedias, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return route('users.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return route('news.index');
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
        $socialmedias = Socialmedia::with('medias')->get();
        $socialmedias = SanitizeSVG::sanitizeSVG($socialmedias);
        $user = User::findOrFail($id);
        return view('users.show', ['image' => $image->base64, 'imageFondo' => $imageFondo->base64, 'socialmedias' => $socialmedias, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return route('news.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if($request->role){
            $newStatus = $user->role == "user" ? "admin" : "user";
            User::findOrFail($id)->update(['role' => $newStatus]);
        }else{
            $newStatus = $user->active_user == 1 ? 0 : 1;
            User::findOrFail($id)->update(['active_user' => $newStatus]);
        }

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return route('news.index');
    }
}
