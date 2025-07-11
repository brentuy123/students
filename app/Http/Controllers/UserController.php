<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all();
        return view('users.users', compact('users'));
    }

    // Show add form
    public function create()
    {
        return view('users.add');
    }

    // Store new user
    public function store(Request $request)
    {
        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads', 'public');
        }

        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'photo' => $photoPath ? 'storage/' . $photoPath : null,
        ]);

        return redirect()->route('users.index');
    }


    // Show edit form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $photoPath = $user->photo;

        if ($request->hasFile('photo')) {
            $photoPath = 'storage/' . $request->file('photo')->store('uploads', 'public');
        }

        $user->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'photo' => $photoPath,
        ]);

        return redirect()->route('users.index');
    }


    // Delete user
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
