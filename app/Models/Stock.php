<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public function marche(){
        return $this->belongsTo(Marche::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
