<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserRole;
 
class RoleController extends Controller
{
    // Display a listing of the roles.
    public function index()
    {
        $user_roles = UserRole::paginate(10);
        return view('admin.roles.index', compact('user_roles'));
    }

    // Show the form for creating a new role.
    public function create()
    {
        return view('admin.roles.form');
    }

    // Show the form for editing the specified role.
    public function edit(UserRole $role)
    {
        return view('admin.roles.form', compact('role'));
    }

    // Update or create the specified role.
    public function update_create(Request $request)
    {
        if ($request->has('id')) {
            $role = UserRole::find($request->id);
            // convert the permission array to string
            $request->merge(['permission' => implode(',', $request->permission)]);
            $role->update($request->all());
        } else {
            // convert the permission array to string
            $request->merge(['permission' => implode(',', $request->permission)]);
            UserRole::create($request->all());
        }

        return redirect()->route('admin.roles.index');
    }

    // Delete the specified role.
    public function delete(UserRole $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index');
    }
 
}
