<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    public function participant(){
        return $this->belongsTo(Participant::class,"id_participant");
    }

    public function vote(){
        return $this->hasMany(Vote::class,"id_projet");
    }
}
