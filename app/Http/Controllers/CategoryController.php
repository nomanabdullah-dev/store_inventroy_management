<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:categories'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        flash('Category created successfully')->success();
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|unique:categories,name,'.$id
        ]);
        Category::where('id', $id)->update([
            'name' => $request->name
        ]);
        flash('Category updated successfully')->success();
        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        flash('Category deleted successfully')->success();
        return redirect()->route('category.index');
    }
}
