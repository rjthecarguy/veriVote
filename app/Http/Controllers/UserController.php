<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();


    return view('users.index')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Role $role)
    {

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users.show')->with('user', $user)
                                    ->with('roles', $roles);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
      

      

        
    
        $user->active = $request->active;
        $user->role = $request->role;
        $user->save();
        
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function editRoles(User $user)
{
    $roles = Role::all();
    return view('user.roles', compact('user', 'roles'));
}

public function updateRoles(Request $request, User $user)
{
    $roleIds = $request->input('roles', []);
    $user->roles()->sync($roleIds);
    return response()->json(['message' => 'Counties updated.']);
}
}
