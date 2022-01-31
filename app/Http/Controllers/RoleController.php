<?php

namespace App\Http\Controllers;

use App\Helpers\PermissionGroup;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = [];
        foreach (PermissionGroup::allTypes() as $type) {
            $permissions[$type] = Permission::query()->where('name', 'like', '%' . $type)->get();
        }
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index')->with('success', tr('Successfully saved'));
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $newRole = [];
        foreach (PermissionGroup::allTypes() as $t) {
            $newRole[$t] = Permission::query()
                ->where('name', 'like', '%' . $t . '%')
                ->get();
        }
        $permissions = [];
        foreach (PermissionGroup::allTypes() as $type) {
            $permissions[$type] = Permission::query()->where('name', 'like', '%' . $type)->get();
        }
        $roles = Role::findOrFail($id);
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('roles', 'permissions', 'rolePermissions', 'newRole'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', tr('Successfully saved'));
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return redirect()->route('roles.index')->with('success', tr('Successfully deleted'));
    }
}
