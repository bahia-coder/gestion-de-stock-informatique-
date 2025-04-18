<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function tirbunale(){
        return $this->belongsTo(Tirbunale::class);
    }
    public function decharge(){
        return $this->belongsTo(Decharge::class);
    }
}
