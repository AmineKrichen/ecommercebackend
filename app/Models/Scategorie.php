<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scategorie extends Model
{
    use HasFactory;
    protected $fillable=[
        "nomscategorie",
        "imagescategorie",
        "categorieID"

    ];
    public function categories(){
        return $this->belongsTo(Scategorie::class,"categorieID");
    }

    public function articles()
{
return $this->hasMany(Article::class,"scategorieID");
}
}
