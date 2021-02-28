<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = App\Flight::paginate(10);
        return view('flights.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection['airplanes'] = App\Airplane::all();
        $collection['airports_takeoff'] = App\Airport::all();
        $collection['airports_landing'] = App\Airport::all();
        $collection['prices'] = App\Price::all();
        return view('flights.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new App\Flight;
        $data->name = $request->name;
        $data->date_take_off = $request->date_take_off;
        $data->date_landing = $request->date_landing;
        $data->airplane_id = $request->airplane_id;
        $data->take_off_airport_id = $request->take_off_airport_id;
        $data->landing_airport_id = $request->landing_airport_id;
        $data->price_id = $request->price_id;
        $data->status = 'att';
        if ($request->hasFile('photo'))
        {
            if (Storage::exists($data->photo))
                Storage::delete($data->photo);
            $data->photo = $request->file('photo')->store('public');
        }
        $data->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $collection = App\Flight::find($id);
        $collection['reserved_economy_class'] = App\Ticket::all()->where('flight_id', '=', $id)->sum('reserved_economy_class');
        $collection['reserved_businessmen_class'] = App\Ticket::all()->where('flight_id', '=', $id)->sum('reserved_businessmen_class');
        $collection['reserved_first_class'] = App\Ticket::all()->where('flight_id', '=', $id)->sum('reserved_first_class');
        return view('flights.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = App\Flight::find($id);
        $collection['airplanes'] = App\Airplane::all();
        $collection['airports_takeoff'] = App\Airport::all();
        $collection['airports_landing'] = App\Airport::all();
        $collection['prices'] = App\Price::all();
        return view('flights.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = App\Flight::find($id);
        $data->name = $request->name;
        $data->date_take_off = $request->date_take_off;
        $data->date_landing = $request->date_landing;
        $data->airplane_id = $request->airplane_id;
        $data->take_off_airport_id = $request->take_off_airport_id;
        $data->landing_airport_id = $request->landing_airport_id;
        $data->price_id = $request->price_id;
        $data->status = $request->status;
        if ($request->hasFile('photo'))
        {
            if (Storage::exists($data->photo))
                Storage::delete($data->photo);
            $data->photo = $request->file('photo')->store('public');
        }
        $data->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        App\Flight::find($id)->delete();
        return redirect()->back();
    }
}
