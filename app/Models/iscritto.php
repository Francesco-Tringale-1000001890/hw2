<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    Class iscritto extends Model{
        use HasFactory;
        public $timestamps = false; //serve per togliere i campi di default che si aspetta
        protected $fillable = ['nome','cognome', 'username','email','password']; //serve per definire i campi della mia tabella, N.B. bisogna usare $fillable se no non funziona!!
        protected $table= 'iscritto';

        public function likes(){
            return $this-> belongsToMany('App\Models\comics', 'likes'); //this indica la classe in cui siamo, quindi iscritti
        }
    }
?>