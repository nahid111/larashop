<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Contracts\Session\Session;


class PermissionController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }


    public function index() {
        $permissions = Permission::all(); //Get all permissions

        return view('adminCrudViews.permissions.index')->with('permissions', $permissions);
    }


    public function create() {
        $roles = Role::get(); //Get all roles
        return view('adminCrudViews.permissions.create')->with('roles', $roles);
    }


    public function store(Request $request) {
        $request->validate([
            'permission_name'=>'required|max:40',
        ]);

        $name = $request['permission_name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];

        $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return redirect('/permissions')->with('success', $permission->name.' permission added!');
    }


    public function show($id) {
        return redirect('/permissions');
    }


    public function edit($id) {
        $permission = Permission::findOrFail($id);

        return view('adminCrudViews.permissions.edit')->with('permission', $permission);
    }


    public function update(Request $request, $id) {
        $permission = Permission::findOrFail($id);
        $request->validate([
            'name'=>'required|max:40',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect('/permissions')->with('success', $permission->name.' permission updated!');
    }


    public function destroy($id) {
        $permission = Permission::findOrFail($id);

        //Make it impossible to delete this specific permission
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('permissions.index')
                ->with('error',
                    'Cannot delete this Permission!');
        }

        $permission->delete();

        return redirect('/permissions')->with('success', 'Permission deleted!');
    }

}


