<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $collection = App\Flight::all();
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
        $data->date_take_off = $request->date_take_off;
        $data->date_landing = $request->date_landing;
        $data->airplane_id = $request->airplane_id;
        $data->take_off_airport_id = $request->take_off_airport_id;
        $data->landing_airport_id = $request->landing_airport_id;
        $data->price_id = $request->price_id;
        $data->status = 'att';
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
        //
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
        $data->date_take_off = $request->date_take_off;
        $data->date_landing = $request->date_landing;
        $data->airplane_id = $request->airplane_id;
        $data->take_off_airport_id = $request->take_off_airport_id;
        $data->landing_airport_id = $request->landing_airport_id;
        $data->price_id = $request->price_id;
        $data->status = 'att';
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
