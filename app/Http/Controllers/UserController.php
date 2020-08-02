<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Auth;
use App;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user|administrator|superadministrator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = App\Flight::all();
        return view('user.index', compact('collection'));
    }

    public function buying()
    {

    }

    public function search()
    {

    }

    public function show()
    {
        $id = Auth::user()->id;
        $role = DB::table('role_user')->where('user_id', $id)->first();
        return view('user.profile', compact('id', 'role'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $request->except('password');
        $data = App\User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->hasFile('photo'))
        {
            if (Storage::exists($data->avatar) and $data->avatar != 'av-default.jpg')
            {
                Storage::delete($data->avatar);
            }
            $data->avatar = $request->photo->store('public');
            //$data->avatar = str_replace('public', 'storage/', $request->file('photo')->store('public'));
        }
        $data->save();
        return back();
    }
    
    public function destroy()
    {
        $id = Auth::user()->id;
        Auth::logout();
        DB::table('role_user')->where('user_id', $id)->delete();
        App\User::find($id)->delete();
        return redirect(route('welcome'));
    }
}
