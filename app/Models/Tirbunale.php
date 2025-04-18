<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tirbunale extends Model
{
    use HasFactory;
    protected $fillable = ['Nom','Adresse','Ntelefone','email'];
    public function commandes(){
        return $this->hasMany(Commande::class);
    }
}
