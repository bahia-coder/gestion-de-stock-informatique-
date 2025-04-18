<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
    public function commande(){
        return $this->belongsTo(Commande::class);
    }
}
