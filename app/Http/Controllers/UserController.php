<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|min:2',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:7|confirmed'
        ]);
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);
        flash('User created successfully')->success();
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'      => 'required|min:2',
            'email'     => 'required|email|unique:users,email,'.$id,
            'password'  => 'nullable|min:7|confirmed'
        ]);

        $user           = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        if($request->has('password') && $request->password != null){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        flash('User updated successfully')->success();
        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        flash('User deleted successfully')->success();
        return redirect()->route('user.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
