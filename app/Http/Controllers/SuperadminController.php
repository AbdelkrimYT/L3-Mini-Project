<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class SuperadminController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadministrator');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*$sd = new User;
        $sd->email = 'nad@app.com';
        $sd->password = Hash::make('password');
        $sd->name = 'SD test';
        $sd->save();
        $sd->attachRole('administrator');*/
        return view('admin.sadmin');
    }
}
