<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    Public Function index(){
    	$products=Product::all();
    	return view('admin.products.index')->with(compact('products'));//listado
    }

    Public Function create(){
    	return view('admin.products.create');//Formulario de registro
    }

    Public Function store(){
    	return view('');//Registrar el nuevo producto en la bd
    }


}
