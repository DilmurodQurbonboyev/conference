<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $permissions = Permission::with('permissions')->get();
        $users = User::orderBy('id', 'desc')->paginate(20);
        return view('admin.users.index', compact('users', 'permissions'));
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.show', compact('users'));
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $users->roles->pluck('name','name')->all();
        return view('admin.users.edit', compact('users', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->syncRoles([$request->roles]);
        return redirect()->route('users.show', $id)->with('success', 'Successfully saved');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'Successfully deleted');
    }
}
