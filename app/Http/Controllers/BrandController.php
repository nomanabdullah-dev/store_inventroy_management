<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('brand.index', compact('brands'));
    }

    public function create()
    {
        return view('brand.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:brands'
        ]);
        brand::create([
            'name' => $request->name
        ]);
        flash('Brand created successfully')->success();
        return redirect()->route('brand.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:brands,name,'.$id
        ]);
        Brand::where('id', $id)->update([
            'name' => $request->name
        ]);
        flash('Brand updated successfully')->success();
        return redirect()->route('brand.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        flash('Brand deleted successfully')->success();
        return redirect()->route('brand.index');
    }
}
