<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSizeStock;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'brand'])->get();
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

        $product = new Product();
        $product->user_id       = Auth::id();
        $product->category_id   = $request->category_id;
        $product->brand_id      = $request->brand_id;
        $product->sku           = $request->sku;
        $product->name          = $request->name;
        $product->cost_price    = $request->cost_price;
        $product->retail_price  = $request->retail_price;
        $product->year          = $request->year;
        $product->desc          = $request->desc;
        $product->status        = $request->status;

        if($request->hasFile('image')){
            $image  = $request->image;
            $name   = Str::random(60) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/product_images', $name);
            $product->image     = $name;
        }
        $product->save();

        //Store product size stock
        if($request->items){
            foreach (json_decode($request->items) as $item){
                $size_stock             = new ProductSizeStock();
                $size_stock->product_id = $product->id;
                $size_stock->size_id    = $item->size_id;
                $size_stock->location   = $item->location;
                $size_stock->quantity   = $item->quantity;
                $size_stock->save();
            }
        }
        return response()->json([
            'success'   => true
        ],HttpResponse::HTTP_OK);
    }

    public function show($id)
    {
        $product = Product::where('id', $id)
                        ->with(['category', 'brand', 'product_stocks.size'])
                        ->first();
        return view('product.show', compact('product'));
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
