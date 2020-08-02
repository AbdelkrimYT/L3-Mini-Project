<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App;
use App\User;

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

    public function showUsers()
    {
        $collection = App\User::paginate(5);
        return view('admin.users', compact('collection'));
    }

    public function edit($id)
    {
        $collection = App\User::find($id);
        $collection['roles'] = App\Role::all()->toArray();
        $collection['user_role'] = DB::table('role_user')->where('user_id', $id)->first();
        return view('admin.edit', compact('collection'));
    }

    public function __update(Request $request, $id)
    {
        App\User::find($id)->syncRoles([$request->role]);
        return back();
    }

    public function showUser($id)
    {
        $collection = App\User::find($id);
        return view('admin.show', compact('collection'));
    }

    public function __destroy($id)
    {
        return 'TEST';
        //DB::table('role_user')->where('user_id', $id)->delete();
        //App\User::find($id)->delete();
        //return redirect()->back();
    }
}
