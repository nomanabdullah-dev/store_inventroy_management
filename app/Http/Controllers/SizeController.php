<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::latest()->get();
        return view('size.index', compact('sizes'));
    }

    public function create()
    {
        return view('size.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'size' => 'required|unique:sizes'
        ]);
        Size::create([
            'size' => $request->size
        ]);
        flash('Size created successfully')->success();
        return redirect()->route('size.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Size $size)
    {
        return view('size.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'size' => 'required|unique:sizes,size,'.$id
        ]);
        Size::where('id', $id)->update([
            'size' => $request->size
        ]);
        flash('Size updated successfully')->success();
        return redirect()->route('size.index');
    }

    public function destroy(Size $size)
    {
        $size->delete();
        flash('Size deleted successfully')->success();
        return redirect()->route('size.index');
    }

    //Handle Ajax Request
    public function getSizesJson()
    {
        $sizes = Size::all();
        return response()->json([
            'success'   => true,
            'data'      => $sizes
        ], Response::HTTP_OK);
    }
}
