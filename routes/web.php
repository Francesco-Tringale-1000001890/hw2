<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/login/username/{query_username}', [LoginController::class, 'checkUsername']);
Route::post('/login', [LoginController::class, 'checkLogin']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//registrazione
Route::get('/registr', [RegistrController::class, 'index'])->name('registr'); // '/registr' indica cio' che devo inserire nell'url per trovare la pagina dopo http://localhost:8000/
                                                                              //name('registr') indica il nome della route, così per chiamarla utilizzo questo nome
Route::post('/registr', [RegistrController::class, 'create']);
Route::get('/registr/username/{query_username}', [RegistrController::class, 'checkUsername']);
Route::get('/registr/email/{query_email}', [RegistrController::class, 'checkEmail']);

//home
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/registr/username/{query_username}', [HomeController::class, 'checkUsername']);
Route::get('/home/marvel_api/{comics}', [HomeController::class, 'comicsAPI']);
Route::any('/home/check_like_or_unlike', [HomeController::class, 'checklike'])->name('check_like_or_unlike'); //any lo uso quando passo un form
Route::any('/home/add_likes', [HomeController::class, 'aggiungi_like'])->name('add_likes'); 
Route::any('/home/remove_likes', [HomeController::class, 'rimuovi_like'])->name('remove_likes');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::any('/profile/remove_likes', [ProfileController::class, 'rimuovi_like'])->name('remove_likes_profile');
Route::get('/profile/stampa_likes', [ProfileController::class, 'stampa_likes'])->name('stampa_likes');