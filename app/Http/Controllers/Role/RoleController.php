<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

// use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::all();
        if(!Gate::allows('role_list')){
            return abort(401);
        }
        $roles = Role::with('permissions')->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Gate::allows('role_create')){
            return abort(401);
        }
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
        // return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('role_create')){
            return abort(401);
        }
        $role = Role::create([
            'name' => $request->role,
            // 'guard_name'=>$request->guard_name,
        ]);
        $role->syncPermissions($request->permission);
        // foreach($request->permission as $permission)
        // {
        //     $role->givePermissionTo($permission);

        // }

        // dd($request);
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Gate::allows('role_edit')){
            return abort(401);
        }
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('roles.edit', compact('role'), compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Gate::allows('role_edit')){
            return abort(401);
        }
        $role = Role::find($id);
        // dd($role);
        $role->update([
            'name' => $request-> role,
        ]);
        // dd($role);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Gate::allows('role_delete')){
            return abort(401);
        }
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index');
    }
}
