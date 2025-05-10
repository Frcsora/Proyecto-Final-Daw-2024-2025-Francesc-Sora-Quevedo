<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayersMediasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialmediaController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\TeamsMediasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/aboutus', AboutusController::class)->name('aboutus');
Route::get('/administracion', AdminController::class)->name('admin');
Route::get('/contactus', ContactusController::class)->name('contactus');
Route::post('/message', MessageController::class)->name('message');
Route::get('/', [NewsController::class, 'index'])->name('welcome');
Route::resource('/news', NewsController::class);
Route::resource('/users', UserController::class);
Route::resource('/socialmedia', SocialmediaController::class);
Route::resource('/images', ImagesController::class);
Route::resource('/tags', TagsController::class);
Route::resource('/games', GamesController::class);
Route::resource('/teams', TeamsController::class);
Route::resource('/teamsmedias', TeamsMediasController::class);
Route::resource('/players', PlayerController::class);
Route::resource('/playersmedias', PlayersMediasController::class);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
