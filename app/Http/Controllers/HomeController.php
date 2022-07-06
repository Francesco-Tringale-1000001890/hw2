<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\comics;
use App\Models\iscritto;
use App\Models\likes;

class HomeController extends Controller
{
    
    public function index() {

        $username_sessione=session('username_sessione');  //mettiamo la nostra variabile di sessione 'username_sessione' in $username_sessione
        if(!isset($username_sessione)){              // se la variabile di sessione non è sattata allora ritorniamo nel login
            return redirect('login');
        }else{                            //se è settata andiamo avanti
            return view('home');
        }

    }

    public function comicsAPI($nome_fumetto){
        $text=$nome_fumetto;
        //public key
       $publickey=env('PUBLICKEY');
       //md5 hash
       $hash=env('HASH');
        $curl=curl_init();
       
       $url_completo="https://gateway.marvel.com/v1/public/comics?format=comic&title=" .$text. "&ts=1&apikey=" .$publickey. "&hash=".$hash;
       curl_setopt($curl, CURLOPT_URL, $url_completo);
       curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
       $result = curl_exec($curl);
       
       //passo il file json
       return $result;
       curl_close($curl);
    }

    public function checklike(Request $request){

        //validiamo cio' che abbiamo inserito nel form
            $request->validate([
                'id'=>['string'],
                'indice'=>['int'],
            ]);
            $comic_id=$request->id;
            $comic_indice=$request->indice;
            $username_sessione=session('username_sessione'); // 'username_sessione' e' il nome che ho dato alla sessione in login 
            //controlliamo se è già stato messo o no il like
            $Select_id_comic=DB::select("SELECT id_comic
                FROM likes 
                WHERE username_utente='".$username_sessione."' AND id_comic='".$comic_id."'");
  
            if(count($Select_id_comic)>0){ //se ho dei risultati dalla query
        
            $response=array("like"=> true, "indice"=> $comic_indice, "id_comic"=> $comic_id); //ho già messo mi piace in precedenza

            }else{

            $response=array("like"=> false, "indice"=> $comic_indice, "id_comic"=> $comic_id); //o è la prima volta che questo account entra/cerca quel personaggio o che non gli ha messo like 
        
            }

        return json_encode($response); 
    }


    //add_likes
    public function aggiungi_like(Request $request){
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
    
            $SelectElement=DB::select("SELECT id, nome, price, immagine FROM comics WHERE id='".$id."' ");
    
            if(count($SelectElement)>0){ //se è già presente nella tabella comics lo inserisco solo in likes 
                $comic_id=$SelectElement[0]->id;
        
                $controllikes=DB::select("SELECT * from likes where username_utente='".$username_sessione."' AND id_comic='".$comic_id."'");
                if(count($controllikes)>0){
                    return response()->json("Post già con like");
                }else{
            
                    $query3=DB::insert("INSERT into likes(username_utente, id_comic) VALUES ('$username_sessione', '".$comic_id."')");
                    return response()->json("Inserimento like con successo!");
                }
      
            }else{ //se non è presente nella tabella comics
            
                $query=DB::insert("INSERT into comics(id,nome, price, immagine) VALUES ('$id','$title', '$price', '$image')");
                if($query) { //se l'inserimento va a buon fine
        
                    $Selectcomicid=DB::select("SELECT id from comics where id='".$id."'");
                    $comic_id=$Selectcomicid[0]->id;
                    $query3=DB::insert("INSERT into likes(username_utente, id_comic) VALUES ('$username_sessione', '$comic_id')");
                    return response()->json("Inserimento nuovo");
                
                }else{
                    return response()->json("Errore");
                }
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
        
        $deletelike=DB::delete("DELETE from likes WHERE username_utente='".$username_sessione."' AND id_comic='".$comic_id."'");
        if($deletelike){
            return response()->json("Like rimosso!");
        }else{
            return response()->json("Errore!");
        }
    }

    public function checkUsername($query) {  //questa e' la funzione chiamata in home.js
        $exist = iscritto::where('username', $query)->exists();
        return ['exists' => $exist];
    }

}
