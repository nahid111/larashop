<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Create a new controller instance. @return void
    public function __construct()
    {
        $this->middleware(['auth', 'shopManagementClearance']);
    }


    // Show the application dashboard.
    public function index()
    {
        return view('adminPages.dashboard');
    }



    public function tables()
    {
        return view('adminPages.tables');
    }

    public function charts()
    {
        return view('adminPages.charts');
    }

}

