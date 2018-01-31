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
    	$categories=Category::paginate(10);
    	return view('admin.categories.index')->with(compact('categories'));//listado
    }

    Public function create(){
    	return view('admin.products.create');//Formulario de registro
    }

    Public function store(Request $request){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	
    	//validaciones
    	$messages=[
			'name.required'=> 'Es nesesario agregar un nombre',
			'name.min'=> 'Es nesesario que el producto tenga almeno 3 caracteres',
			'description.required'=> 'Es nesesario agregar una descripcion',
			'description.max'=> 'Es nesesario que el producto tenga menos de 255 catacteres.',
			'price.required'=> 'Es nesesario que el producto tenga un precio',
			'price.numeric'=> 'Es nesesario un precio valido',
			'price.min'=> 'No se admiten valores negativos.'
		];
		$rules=[
			'name'=> 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0'
		];
    	$this->validate($request,$rules, $messages);
    	//registrar el producto
    	$product= new Product();
    	$product ->name = $request->input('name');
		$product ->description = $request->input('description');
		$product ->price = $request->input('price');
		$product ->long_description = $request->input('long_description');
		$product->save();//insert

		return redirect('/admin/products');


    }

	Public function edit($id){
		//return "mostrar aqui el form de edicion para el producto con id: $id";
		$product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product'));//Formulario de edicion O:
    }

    Public function update(Request $request, $id){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	//validaciones
    	$messages=[
			'name.required'=> 'Es nesesario agregar un nombre',
			'name.min'=> 'Es nesesario que el producto tenga almeno 3 caracteres',
			'description.required'=> 'Es nesesario agregar una descripcion',
			'description.max'=> 'Es nesesario que el producto tenga menos de 255 catacteres.',
			'price.required'=> 'Es nesesario que el producto tenga un precio',
			'price.numeric'=> 'Es nesesario un precio valido',
			'price.min'=> 'No se admiten valores negativos.'
		];
		$rules=[
			'name'=> 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0'
		];
    	$this->validate($request,$rules, $messages);
    	//editar
    	$product= Product::find($id);
    	$product ->name = $request->input('name');
		$product ->description = $request->input('description');
		$product ->price = $request->input('price');
		$product ->long_description = $request->input('long_description');
		$product->save();//insert

		return redirect('/admin/products');


    }


      Public function destroy($id){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
    	$product= Product::find($id);
		$product->delete();

		return back();


    }
}
