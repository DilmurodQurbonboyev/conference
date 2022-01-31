<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::paginate(20);

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $name = $request->name;
        for ($i = 0; $i < count($name); $i++) {
            $permissionArray = [
                'name' => $name[$i],
            ];
            Permission::create($permissionArray);
        }
        return redirect()->route('permissions.index')->with('success', tr('Successfully saved'));
    }

    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        return view('admin.permissions.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {
        Permission::findOrFail($id)->update($request->all());
        return redirect()->route('permissions.index')->with('success', tr('Successfully saved'));
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();
        return redirect()->route('permissions.index')->with('success', tr('Successfully deleted'));
    }
}
