<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;



class RoleController extends AdminController
{
  
    public function index()
    {
        $roles = Role::latest()->paginate('10');
        return view('Admin.Role.index', compact('roles'));
    }

  
    public function create()
    {
        $permissions = Permission::all();
        return view('Admin.Role.RoleAdd', compact('permissions'));
    }


    public function store(Request $request)
    {

        $this->validate(request(), [
            "name" => "required",
            "title" => "required",
        ]);

        $role = Role::create([
            "name" => $request['name'],
            "title" => $request['title'],
        ]);
        $role->save();

        $role->permissions()->sync($request->input('permission_id'));

        return redirect(route('role.index'));
    }


    public function show(Role $role)
    {
        //
    }


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('Admin.Role.RoleEdit', compact('role', 'permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permission_id'));
        return redirect(route('role.index'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('role.index'));
    }
}
