<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function edit()
    {
        $user = auth()->user();

        return view('my-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'password' => 'sometimes|nullable|string|min:6|confirmed',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (!$request->filled('password')) {
            $user->fill($input)->save();
            return back()->with('success-message', 'Profile updated successfully!');
        }

        $user->password = Hash::make($request->password);
        $user->fill($input)->save();

        return back()->with('success-message', 'Profile (and password) updated successfully!');
    }
}
