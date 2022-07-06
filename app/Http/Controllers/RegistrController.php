<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\iscritto;
use Illuminate\Support\Facades\Session;

class RegistrController extends Controller
{
    public function index(){
        return view('registr'); //cosi' mostro la view registr.blase.php
    }

    protected function create()
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $newIscritto =  iscritto::create([       //creiamo un nuovo iscritto nella tabella iscritto(Models)
            'nome' => $request['nome'],
            'cognome' => $request['cognome'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => password_hash($request['password'], PASSWORD_BCRYPT), //per inserire la password direttamente cryptata

            ]);
            if ($newIscritto) {
                $username=Session::put('username_sessione', $newIscritto->username);   //Creiamo la variabile di Sessione di nome 'username_sessione'
                
                return redirect('home');
            } 
            else {
                return redirect('registr')->withInput();
            }
        }
        else 
            return redirect('registr')->withInput();
    }

    //queste è una funzione privata quindi si può chiamare solo dentro questo file php, controlla gli errori dei vari input
    private function countErrors($data) {
            $error = array();
        
            //gestisco l'username 
            if($data["username"]<8){
                $error[]="L'username deve essere di almeno 8 caratteri";
            }

   
            //password
            $pattern='/^(?=.*[!@#$%^&*_])(?=.*[0-9])(?=.*[A-Z]).{10,}$/';
            /* minimo 10 caratteri, massimo qualunque 
            minimo 1 lettera maiuscola
            minimo 1 numero
            minimo 1 dei suguenti caratteri speciali
            */
            if(!preg_match($pattern, $data["password"])){
            $error[]="Inserire almeno 10 caratteri, 1 lettera maiuscola, 1 numero, e almeno uno dei seguenti caratteri speciali !@#$%^&*_ ";
            }

   
            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
            $error[]="Email non valida!";
            }

      return count($error);//torno il numero di errori alla funziona sopra, se sono pari a zero allora li inserisco nel db e mi reindirizzo nella home
    }

    public function checkUsername($query) {  //questa e' la funzione chiamata in registr.js
        $exist = iscritto::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) { //questa e' la funzione chiamata in registr.js
        $exist = iscritto::where('email', $query)->exists();
        return ['exists' => $exist];
    }
}


