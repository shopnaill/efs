<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // get all users
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    // create new user
    public function create()
    {
        return view('admin.user.form');
    }

    // edit user
    public function edit(User $user)
    {
        return view('admin.user.form', compact('user'));
    }

    // update or create user
    public function update_create(Request $request, User $user = null)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($user) {
            $user->update($request->all());
        } else {
            User::create($request->all());
        }

        return redirect()->route('admin.admin.user.index');
    }

    // delete user
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.admin.user.index');
    }
}
