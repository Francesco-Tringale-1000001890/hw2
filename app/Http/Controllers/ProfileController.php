<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\comics;
use App\Models\iscritto;
use App\Models\likes;

class ProfileController extends Controller
{
    
    public function index() {
        $username_sessione=session('username_sessione');      //mettiamo nuova variabile, come variabile di sessione
    if(!isset($username_sessione)){              // se la variabile di sessione non è sattata allora ritorniamo nel login
            return redirect('login');
    }else{                            //se è settata andiamo avanti
        return view('profile')
        ->with(['username_sessione'=>$username_sessione]); //passo la variabile di sessione alla view profile
     }
    }

    public function rimuovi_like(Request $request){
        $request->validate([
            'id'=>['string'],
            'title'=>['string'],
            'price'=>['string'],
            'image'=>['string'],
        ]);
        $id=$request->id;
        $title=$request->title;
        $price=$request->price;
        $image=$request->image;
        //variabile di sessione
        $username_sessione=session('username_sessione');
     $Selectcomicid=DB::select("SELECT id from comics where id='".$id."' ");
     $comic_id=$Selectcomicid[0]->id;
     
     //return json_encode($comic_id);
     $deletelike=DB::delete("DELETE from likes WHERE username_utente='".$username_sessione."' AND id_comic='".$comic_id."'");
     if($deletelike){
     return response()->json("Like rimosso!");
     }else{
         return response()->json("Errore!");
     }
       }

    public function stampa_likes(){
        
        $username_sessione=session('username_sessione');
        $comics_username_sessione=array();
        $query=DB::select("SELECT comics.id, comics.nome, comics.price, comics.immagine
        FROM iscritto JOIN likes ON iscritto.username=likes.username_utente JOIN comics ON comics.id=likes.id_comic
        WHERE iscritto.username='".$username_sessione."'") ;
        return json_encode($query);
    }
    
    }