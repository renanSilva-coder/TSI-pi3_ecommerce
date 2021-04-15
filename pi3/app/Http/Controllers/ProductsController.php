<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;


class ProductsController extends Controller
{
    public function index(){
        return view('product.index')->with('produtos', Product::all());
    }
 
    public function create(){
        return view('product.create')->with(['categories' => Category::all(),
                                             'tags' => Tag::all()]);
    }

    public function store(Request $request){
        if($request->image){
            $image = $request->file('image')->store('product');
            $image = 'storage/'.$image;
        }else{
            $image = 'storage/product/beagle.jpg';
        }
        

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image
            
        ]);

        $product->tags()->sync($request->tags);

        session()->flash('success', 'Produto Cadastrado Com Sucesso!');
        return redirect(route('product.index'));
    }

    public function show(Product $product)
    {
        dd($product);
    }

    public function edit(Product $product){
        return view('product.edit')->with(['product'=>$product, 'categories'=>Category::all(),
        'tags' => Tag::all()]);
    }

    public function update(Request $request, Product $product){
        if($request->image){
            $image = $request->file('image')->store('product');
            $image = 'storage/'.$image;
            if($product->image != "storage/product/beagle.jpg")
                Storage::delete(str_replace('storage/','',$product->image));
        }else{
            $image = $product->image;
        }
        
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $image
            
        ]);

        $product->tags()->sync($request->tags);

        session()->flash('success', 'Produto Alterado Com Sucesso');
        return redirect(route('product.index'));
    }

    public function destroy(Product $product){
        $product->delete();
        session()->flash('success', 'Produto Deletado Com Sucesso');
        return redirect(route('product.index'));
    }

    public function trash(){
        return view('product.trash')->with('produtos', Product::onlyTrashed()->get());
        //onlyTrashed()->get retorna a lista de produtos que tem softdelete
    }

    public function restore($id){
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();

        $product->restore();
        session()->flash('success', 'Produto restaurado Com Sucesso');
        return redirect(route('product.trash'));
    }
 
}
