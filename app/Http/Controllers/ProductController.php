<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(), [
            'category_id'   => 'required|numeric',
            'brand_id'      => 'required|numeric',
            'sku'           => 'required|string|max:100|unique:products',
            'name'          => 'required|string|min:2|max:100',
            'image'         => 'required|image|mimes:jpg,jpeg,png|max:1024',
            'cost_price'    => 'required|numeric',
            'retail_price'  => 'required|numeric',
            'year'          => 'required',
            'desc'          => 'required|max:200',
            'status'        => 'required|numeric'
        ]);

        if($validate->fails()){
            return response()->json([
                'success'   => false,
                'errors'    => $validate->errors()
            ],HttpResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        return $request->all();
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
