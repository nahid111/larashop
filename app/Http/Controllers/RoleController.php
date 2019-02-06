<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }


    public function index() {
        $roles = Role::all();//Get all roles

        return view('adminCrudViews.roles.index')->with('roles', $roles);
    }


    public function create() {
        $permissions = Permission::all();//Get all permissions

        return view('adminCrudViews.roles.create', ['permissions'=>$permissions]);
    }


    public function store(Request $request) {
        //Validate name and permissions field
        $request->validate([
                'name'=>'required|unique:roles|max:15',
                'permissions' =>'required',
            ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();
        //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return redirect()->route('roles.index')->with('success', 'Role '. $role->name.' added!');
    }


    public function show($id) {
        return redirect('/roles');
    }


    public function edit($id) {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $data = array(
            "role" => $role,
            "permissions" => $permissions
        );
        return view('adminCrudViews.roles.edit', $data);
    }


    public function update(Request $request, $id) {

        $role = Role::findOrFail($id);//Get role with the given id
        //Validate name and permission fields
        $request->validate([
            'name'=>'required|max:10|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();

        $p_all = Permission::all();//Get all permissions

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p); //Remove all permissions associated with role
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding from //permission in db
            $role->givePermissionTo($p);  //Assign permission to role
        }

        return redirect('/roles')->with('success', 'Role '. $role->name.' updated!');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('/roles')->with('success', 'Role deleted!');
    }
}
