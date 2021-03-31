<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at','updated_at'];
   
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion a uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
