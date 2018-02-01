<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public static $messages=[
			'name.required'=> 'Es nesesario agregar un nombre a la categoria',
			'name.min'=> 'Es nesesario que la categoria tenga almenos 3 caracteres',
			'description.max'=> 'Es nesesario que la categoria tenga menos de 255 catacteres.'
		];
	public static $rules=[
			'name'=> 'required|min:3',
			'description' => 'required|max:255'		];
			
	protected $fillable = ['name', 'description'];
    //
    //$category->products
    public function products(){
    	return $this->hasMany(Product::class);
    	//una categoria puede tener muchosporductos :v
    }

    public function getFeaturedImageUrlAttribute(){
    	$featuredProduct= $this->products()->first();
    	return $featuredProduct->featured_image_url;
    }
}
