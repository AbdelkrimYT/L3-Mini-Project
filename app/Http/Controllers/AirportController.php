<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = App\Airport::paginate(10);
        return view('airports.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new App\Airport;
        $data->name = $request->name;
        $data->state = $request->state;
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
        $collection = App\Airport::find($id);
        return view('airports.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = App\Airport::find($id);
        return view('airports.edit', compact('collection'));
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
        $data = App\Airport::find($id);
        $data->name = $request->name;
        $data->state = $request->state;
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
        App\Airport::find($id)->delete();
        return redirect()->back();
    }
}
