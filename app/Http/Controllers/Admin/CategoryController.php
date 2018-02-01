<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    //
     //
    Public function index(){
    	$categories=Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));//listado
    }

    Public function create(){
    	return view('admin.categories.create');//Formulario de registro
    }

    Public function store(Request $request){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	
    	//validaciones
    

    	$this->validate($request,Category::$rules, Category::$messages);
    	//registrar la categoria
    	/*$product= new Product();
    	$product ->name = $request->input('name');
		$product ->description = $request->input('description');
		$product ->price = $request->input('price');
		$product ->long_description = $request->input('long_description');
		$product->save();//insert*/
		Category::create($request->all());

		return redirect('/admin/categories');


    }

	Public function edit(Category $category){
		//return "mostrar aqui el form de edicion para el producto con id: $id";
		//$category = Category::find($id);
    	return view('admin.categories.edit')->with(compact('category'));//Formulario de edicion O:
    }

    Public function update(Request $request, Category $category){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	//validaciones
   		 

    	$this->validate($request,Category::$rules, Category::$messages);
    	//registrar la categoria
    	/*$product= new Product();
    	$product ->name = $request->input('name');
		$product ->description = $request->input('description');
		$product ->price = $request->input('price');
		$product ->long_description = $request->input('long_description');
		$product->save();//insert*/
		$category->update($request->all());

		return redirect('/admin/categories');

    }


      Public function destroy(Category $category){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
		$category->delete();

		return back();


    }
}
