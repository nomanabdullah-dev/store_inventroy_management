<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:categories'
        ]);
        Product::create([
            'name' => $request->name
        ]);
        flash('Product created successfully')->success();
        return redirect()->route('product.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:categories,name,'.$id
        ]);
        Product::where('id', $id)->update([
            'name' => $request->name
        ]);
        flash('Product updated successfully')->success();
        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        flash('Product deleted successfully')->success();
        return redirect()->route('product.index');
    }
}
