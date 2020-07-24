<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class AirplaneController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = App\Airplane::all()->toArray();
        for ($i = 0; $i < sizeof($collection); $i++)
            $collection[$i]['airplane_model'] = App\AirplaneModel::find($collection[$i]['model_id']);
        return view('admin.airplanes.index', compact("collection"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = App\AirplaneModel::all()->toArray();
        return view('admin.airplanes.create', compact('collection'));
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
        return view('admin.airplanes.show', compact('collection'));
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
        $airplane_model_list = App\AirplaneModel::all()->toArray();
        return view('admin.airplanes.edit', compact('collection', 'airplane_model_list'));
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