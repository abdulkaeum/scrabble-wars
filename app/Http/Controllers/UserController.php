<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:5', 'max:100'],
            'email' => ['email', 'required', 'min:5', 'max:100', Rule::unique('users', 'email')]
        ]);

        $attributes['password'] = bcrypt($attributes['email']);

        User::create($attributes);

        return redirect()->route('user.index')->with('success', 'Member added');
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:5', 'max:100'],
            'email' => ['email', 'required', 'min:5', 'max:100', Rule::unique('users', 'email')->ignore($user)]
        ]);

        $user->update($attributes);

        return redirect()->route('user.index')->with('success', 'Member updated');

    }
}
