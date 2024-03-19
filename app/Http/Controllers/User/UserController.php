<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller {
    public function index() {
        if(!Gate::allows('user_list')){
            return abort(401);
        }
        // $users = User::all();
        $users = User::with('roles')->get();
        // dd($categories);
        return view('users.index', compact('users'));
    }
    public function create() {
        if(!Gate::allows('user_create')){
            return abort(401);
        }
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }
    public function store(Request $request) {
        // dd($request->all());
        if(!Gate::allows('user_create')){
            return abort(401);
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required','integer', 'min:1']
        ]);
        // $role = Role::find($request->role_id)->first();
        $role = Role::where('id', $request->role_id)->first();
        // dd($role);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // DB::table('categories')->insert([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'status' => $request->status
        // ]);
        $user->assignRole($role);
        // dd($user);
        return redirect()->route('users.index');
    }
    public function edit($id) {
        // dd($id);
        // $user = User::find($id);
        if(!Gate::allows('user_edit')){
            return abort(401);
        }
        $user = User::where('id', $id)->first();
        // dd($category);
        // dd($user);
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id) {
        if(!Gate::allows('user_edit')){
            return abort(401);
        }
        $user = User::find($id);
        // dd($category);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
          'password' => $request->password
        ]);

        // DB::table('categories')->where('id', $id)->update([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //   'status' => $request->status
        // ]);
        return redirect()->route('users.index');
    }
    public function destroy($id) {
        if(!Gate::allows('user_delete')){
            return abort(401);
        }
        user::where('id', $id)->delete();
        // DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('users.index');
    }
}
