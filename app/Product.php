<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
     public function category(){
    	return $this->belongsTo(Category::class);
    	//un producto pertenece a una categorita
    }
    public function images(){
    	return $this->hasMany(ProductImage::class);
    	//esto tiene muchas imagenes o: 
    }
}
