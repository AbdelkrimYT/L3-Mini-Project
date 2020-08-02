<?php

namespace App\Http\Controllers;
use App;

use Illuminate\Http\Request;

class AdminController extends UserController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:superadministrator|administrator');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $collection['users'] = count(App\User::all());
        $collection['airplanes'] = count(App\Airplane::all());
        $collection['flights'] = count(App\Flight::all());
        return view('admin.index', compact('collection'));
    }
    
    //
    public function showTest()
    {
        $x = App\User::find(7)->tickets;
        $x = App\Ticket::find($x[0]->id)->flight;
        return $x;
    }
}
