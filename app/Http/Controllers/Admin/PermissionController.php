<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;

class PermissionController extends AdminController
{

    public function index()
    {
        $permissions = Permission::latest()->paginate('10');
        return view('Admin.Permission.index', compact('permissions'));
    }


    public function create()
    {
        return view('Admin.Permission.PermissionAdd');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            "name" => "required",
            "title" => "required",
        ]);

        Permission::create([
            "name" => $request['name'],
            "title" => $request['title'],
        ]);

        return redirect(route('permission.index'));
    }


    public function show(Permission $permission)
    {
        //
    }


    public function edit(Permission $permission)
    {
        return view('Admin.Permission.PermissionEdit', compact('permission'));
    }


    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return redirect(route('permission.index'));
    }


    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect(route('permission.index'));
    }
}
