<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electeur extends Model
{
    use HasFactory;

    public function vote(){
        return $this->hasMany(Vote::class,"id_user");
    }
}
