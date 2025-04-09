<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', [
            'admins' => User::where('is_superadmin', false)->where('id', '!=', Auth::id())->paginate(10)
        ]);
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Delete successfully.');
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('users.index')->with('success', 'New user added.');
    }
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }
    public function update(User $user, Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        $user->update($validated_data);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function resetPassword(User $user)
    {
        $user->update([
            'password' => $user->email
        ]);

        return redirect()->route('users.index')->with('success', 'Password reset success. Your new password is: ' . $user->email);
    }
}
