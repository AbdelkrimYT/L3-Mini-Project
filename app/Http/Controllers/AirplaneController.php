<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = App\Airplane::paginate(10);
        return view('airplanes.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = App\AirplaneModel::all();
        return view('airplanes.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new App\Airplane;
        $data->name = $request->name;
        $data->model_id = $request->model_id;
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
        $collection = App\Airplane::find($id);
        return view('airplanes.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = App\Airplane::find($id);
        return view('airplanes.edit', compact('collection'));
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
        $data = App\Airplane::find($id);
        $data->name = $request->name;
        $data->model_id = $request->model_id;
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
        $data = App\Airplane::find($id)->delete();
        return redirect()->back();
    }
}
