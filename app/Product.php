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

    public function getFeaturedImageUrlAttribute(){
    	$featuredImage = $this->images()->where('featured',true)->first();
    	if(!$featuredImage)
    		$featuredImage=$this->images()->first();

    	if($featuredImage){
    		return $featuredImage->url;
    	}

    	//devolveruna imagen por defecto

    	return '/images/products/default.jpg';
    }
}
