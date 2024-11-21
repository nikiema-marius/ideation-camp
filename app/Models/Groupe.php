<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    public function projet(){
        return $this->belongsTo(Projet::class,"id_projet");
    }

    public function participant(){
        return $this->hasMany(Participant::class,"id_groupe");
    }
}
