<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct() {
        //isAdmin middleware lets only users with a //specific permission permission to access these resources
        $this->middleware(['auth', 'isAdmin']);
    }


    public function index() {
        $users = User::all();
        return view('adminCrudViews.users.index')->with('users', $users);
    }


    public function create() {
        $roles = Role::all();
        return view('adminCrudViews.users.create')->with('roles', $roles);
    }


    public function store(Request $request) {
        //Validate name, email and password fields
        $request->validate([
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password')); //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }

        return redirect('/users')->with('success', 'User added successfully');
    }


    public function show($id) {
        return redirect('users');
    }


    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::all(); //Get all roles
        $data = array(
            'user' => $user,
            'roles' => $roles
        );
        return view('adminCrudViews.users.edit', $data);
    }


    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

        $request->validate([
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);

        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }

        return redirect()->route('users.index')->with('success', 'User successfully edited.');
    }


    public function destroy($id) {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User successfully deleted.');
    }
}
