<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class CustomerAuthController extends Controller
{

    public function showCustomerLoginForm(){
        return view('auth.customer_login');
    }



    public function customerLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $attemptLogin = Auth::attempt([ 'email'=>$request->email, 'password'=>$request->password ]);
        if( $attemptLogin ){
            if( $previousURL = Session::get('url.intended') ){
                return redirect($previousURL);
            }
            return redirect('/home');
        }

        $loginFailed = "Login Failed - incorrect user or password";
        return redirect('/customer/login')->with('loginFailed', $loginFailed);
    }



    public function registerCustomer(Request $request){
        $request->validate([
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);

        $customer = User::create($request->only('email', 'name', 'password'));
        //Assigning role to Customer
        $role_r = Role::where('name', '=', "Customer")->firstOrFail();
        $customer->assignRole($role_r);


        if( $previousURL = Session::get('url.intended') ){
            return redirect($previousURL);
        }

        return redirect('/home');
    }



    public function customerLogout(Request $request){
        Auth::logout();
        return redirect('/home');
    }

}


