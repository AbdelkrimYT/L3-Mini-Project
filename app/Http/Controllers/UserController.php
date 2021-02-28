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
        $collection = App\Flight::paginate(5);
        $airport = App\Airport::all();
        return view('user.index', compact('collection', 'airport'));
    }

    public function buying(Request $request)
    {
        return back();
        $flight = App\Flight::find($request->flight_id);
        $number_economy = App\Ticket::all()->where('flight_id', '=', $request->flight_id)->sum('reserved_economy_class');
        $number_business = App\Ticket::all()->where('flight_id', '=', $request->flight_id)->sum('reserved_businessmen_class');
        $number_first = App\Ticket::all()->where('flight_id', '=', $request->flight_id)->sum('reserved_first_class');
        $max_economy = $flight->airplane->airplaneModel->number_of_economy_class_seats;
        $max_business = $flight->airplane->airplaneModel->number_of_businessmen_seats;
        $max_first = $flight->airplane->airplaneModel->number_of_first_class_seats;
        $user_money = App\User::find($request->user_id)->credit_card->amount;
        $calculate_price =
            $flight->price->economic_class_price * $request->num_select_economy +
            $flight->price->business_class_price * $request->num_select_business +
            $flight->price->firste_class_price * $request->num_select_first;
        try
        {
            if ($number_economy + $request->num_select_economy > $max_economy)
                throw new Exception('The required number of economy seats is not available. Available only'.
                    (string)($max_economy - $number_economy + $request->num_select_economy));
            if ($number_business + $request->num_select_business > $max_business)
                throw new Exception('The required number of business seats is not available. Available only'.
                    (string)($max_business - $number_business + $request->num_select_business));
            if ($number_first + $request->num_select_first > $max_first)
                throw new Exception('The required number of business seats is not available. Available only'.
                    (string)($max_first - $number_first + $request->num_select_first));
            if ($user_money < $calculate_price)
                throw new Exception('Your balance is insufficient. C='. $user_money);
        }

        catch (Exception $e) {
            return view('user.buy')->with($e);
        }

        finally
        {
            return view('user.buy');
        }
    }

    public function show_buying_form($id)
    {
        $collection = App\Flight::find($id);
        return view('user.buy', compact('collection'));
    }

    public function create_credit_card(Request $request)
    {
        $data = new App\CreditCard;
        $data->user_id = Auth::user()->id;
        $data->number = $request->number;
        $data->expiration_date = $request->expiration_date;
        $data->save();
        return back();
    }

    public function edit_credit_card(Request $request)
    {
        $data = App\CreditCard::find($request->id);
        $data->user_id = Auth::user()->id;
        $data->number = $request->number;
        $data->expiration_date = $request->expiration_date;
        $data->save();
        return back();
    }

    public function search(Request $request)
    {
        $collection = App\Airport::all();
        $result = App\Flight::all()->where('date_take_off', '>=', date('Y-m-d'))
            ->where('date_take_off', '>=', $request->date_takeoff)
            ->where('date_take_off', '<=', $request->date_takeoff_max)
            ->where('take_off_airport_id', '=', $request->take_off_airport_id)
            ->where('landing_airport_id', '=', $request->landing_airport_id)
            ;//->paginate(2);
        return view('user.search', compact('collection', 'result', 'request'));
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
