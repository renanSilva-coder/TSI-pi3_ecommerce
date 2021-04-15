<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index(){
        return view('category.index')->with('categories', Category::all());
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        Category::create($request->all()); //Category é a model aqui
        session()->flash('success', 'Categoria Cadastrada Com Sucesso!');
        return redirect(route('category.index'));
    }

     public function show(Category $category)
    {
        //
    }

    public function edit(Category $category){
        return view('category.edit')->with('category',$category);
    }

    public function update(Request $request, Category $category){
        $category->update($request->All());
        session()->flash('success', 'Categoria Alterada Com Sucesso');
        return redirect(route('category.index'));
    }

    function destroy(Category $category){
        $category->delete();
        session()->flash('success', 'Categoria Deletada Com Sucesso');
        return redirect(route('category.index'));
    }

    public function trash(){
        return view('category.trash')->with('categories', Category::onlyTrashed()->get());
        //onlyTrashed()->get retorna a lista de categorias que tem softdelete
    }

    public function restore($id){
        $category = Category::onlyTrashed()->where('id', $id)->firstOrFail();

        $category->restore();
        session()->flash('success', 'Categoria Restaurada Com Sucesso');
        return redirect(route('category.trash'));
    }


}
