<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model{         //la classe la chiamo al plurale rispetto la tbella a cui si riferisce
    use HasFactory;
    public $timestamps = false;     //IMPORTANTE metterli sempre se no si aspetta questi campi
    protected $fillable = ['id', 'username_utente','id_comic'];   //in pratica definiamo i campi della mia tabella, N.B. bisogna usare $fillable se no non funziona!!
    protected $table = 'likes';   //Specifico il nome 
}



?>