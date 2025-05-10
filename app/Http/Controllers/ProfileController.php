<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Helpers\UserValidator;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Images;
use App\Models\Socialmedia;
=======
use App\Http\Requests\ProfileUpdateRequest;
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
<<<<<<< HEAD
        $socialmedias = Socialmedia::all();

        $image = Images::where('type', 'logo')
            ->where('active', 'true')->first();
        $imageFondo = Images::where('type', 'fondo')
            ->where('active', 'true')->first();
        UserValidator::validateUser();
        return view('profile.edit', [
            'user' => $request->user(),
            'socialmedias' => $socialmedias,
            'image' => $image->base64,
            'imageFondo' => $imageFondo->base64 ,
=======
        return view('profile.edit', [
            'user' => $request->user(),
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

<<<<<<< HEAD
        return Redirect::route('profile.edit')->with('status', 'Perfil actualizado');
=======
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
