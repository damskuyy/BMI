<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users'],
            'password' => ['required','confirmed', Password::defaults()],
            'avatar' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'],
            'role' => ['required','in:admin,editor,user']
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ];

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/avatars', $name);
            $data['avatar'] = 'avatars/' . $name;
        }

        User::create($data);

        return redirect()->route('users.index')->with('success','User created');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255','unique:users,email,'.$user->id],
            'password' => ['nullable','confirmed', Password::defaults()],
            'avatar' => ['nullable','image','mimes:jpg,jpeg,png','max:2048'],
            'role' => ['required','in:admin,editor,user']
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar');
            $name = time() . '.' . $file->extension();
            $file->storeAs('public/avatars', $name);
            $data['avatar'] = 'avatars/' . $name;
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success','User updated');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error','Cannot delete own account');
        }

        if ($user->avatar) {
            Storage::delete('public/' . $user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success','User deleted');
    }
}
