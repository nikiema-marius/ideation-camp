<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvenementParticipant extends Model
{
    use HasFactory;

    public function evenement(){
        return $this->belongsTo(Evenement::class,"id_evenement");
    }

    public function participant(){
        return $this->belongsTo(Participant::class,"id_participant");
    }
}
