<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;


class ManagerController extends Controller
{
         // Display a listing of the managers.
    public function index()
    {
        $managers = User::whereNotNull('role')->paginate(10);
        $user_roles = UserRole::all();
        return view('admin.managers.index', compact('managers', 'user_roles'));
    }

    // Show the form for creating a new team.
    public function create()
    {
        $roles = UserRole::all();
        return view('admin.managers.form', compact('roles'));
    }

    // Show the form for editing the specified team.
    public function edit(User $manager)
    {
        $roles = UserRole::all();
        return view('admin.managers.form', compact( 'roles', 'manager'));
    }

    // Update or create the specified team.
    public function update_create(Request $request)
    {
        if ($request->has('id')) {
            $manager = User::find($request->id);
            if ($request->user_password) {
                $request->merge(['password' => Hash::make($request->user_password)]);
            }

            $manager->update($request->all());
        } else {
            // add password to the request
            $request->merge(['password' => Hash::make($request->user_password)]);
            User::create($request->all());
        }

        return redirect()->route('admin.manager.index');
    }

    // Delete the specified managers.
    public function delete(User $manager)
    {
        $manager->delete();

        return redirect()->route('admin.manager.index');
    }
}
