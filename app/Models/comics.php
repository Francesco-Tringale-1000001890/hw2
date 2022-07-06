<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    Class comics extends Model{
        use HasFactory;
        public $timestamps = false; //serve per togliere i campi di default che si aspetta
        protected $fillable = ['id','nome', 'price','immagine']; //serve per definire i campi della mia tabella, N.B. bisogna usare $fillable se no non funziona!!
        protected $table= 'comics'; //nome tabella

        public function likes(){
            return $this-> belongsToMany('App/Models/iscritto'); // dove iscritto e' il nome del file php
        }
    }
?>