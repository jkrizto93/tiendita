<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;
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
    	$this->validate($request,Category::$rules, Category::$messages);
    	
		$category = Category::create($request->only('name','description'));

        if ($request->hasfile('image')){
            //guardar la img en nuestro proyecto
            $file =$request->file('image');
            $path = public_path().'/images/categories';
            $fileName=uniqid().$file->getClientOriginalName();
            $moved=$file->move($path,$fileName);
            //update 1 registro en latabla prodcut_images
            if($moved){  
                $category->image=$fileName;
                $category->save();//update
            }
            
        }

		return redirect('/admin/categories');


    }

	Public function edit(Category $category){
		//return "mostrar aqui el form de edicion para el producto con id: $id";
		//$category = Category::find($id);
    	return view('admin.categories.edit')->with(compact('category'));//Formulario de edicion O:
    }

    Public function update(Request $request, Category $category){
    	

    	$this->validate($request,Category::$rules, Category::$messages);
    
		$category->update($request->only('name','description'));

        if ($request->hasfile('image')){
            //guardar la img en nuestro proyecto
            $file =$request->file('image');
            $path = public_path().'/images/categories';
            $fileName=uniqid().$file->getClientOriginalName();
            $moved=$file->move($path,$fileName);
            //update 1 registro en latabla prodcut_images
            if($moved){  
                $previousPath =$path.'/'.$category->image;

                $category->image=$fileName;
                $saved=$category->save();//update
                if($saved)
                    File::delete($previousPath);
            }
            
        }

		return redirect('/admin/categories');

    }


      Public function destroy(Category $category){
    	//return view('');//Registrar el nuevo producto en la bd
    	//dd($request->all());
		$category->delete();

		return back();


    }
}
