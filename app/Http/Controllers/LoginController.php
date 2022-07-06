<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\iscritto;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('login')                 //pagina da visulizzare (login)
        ->with('csrf_token', csrf_token()); 
     }

    public function checkLogin() {
        $password_input=request('password'); //password inserita da tastiera
        $iscritto = iscritto::where('username', request('username'))->first();

        if($iscritto !== null && Hash::check($password_input, $iscritto->password) ) { 
            $username=Session::put('username_sessione', $iscritto->username);//Creiamo la variabile di Sessione dell'username, si chiamera' 'username_sessione'
            return view('home');
        }
        else {
            return redirect('login')->withInput();
        }
    }

    public function checkUsername($query) {  //questa e' la funzione chiamata in login.js
        $exist = iscritto::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    //inserisco il logout qui perché l'ho inserito nella route LoginController
    public function logout() {
        Session::flush();
        return redirect('login');
    }

}
