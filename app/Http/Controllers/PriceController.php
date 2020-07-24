<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PriceController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = App\Price::all()->toArray();
        return view('admin.prices.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prices.create')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new App\Price;
        $data->economic_class_price = $request->economic_class_price;
        $data->business_class_price = $request->business_class_price;
        $data->firste_class_price = $request->firste_class_price;
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
        $collection = App\Price::find($id);
        return view('admin.prices.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = App\Price::find($id);
        return view('admin.prices.edit');
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
        $data = App\Price::find($id);
        $data->economic_class_price = $request->economic_class_price;
        $data->business_class_price = $request->business_class_price;
        $data->firste_class_price = $request->firste_class_price;
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
        App\Price::find($id)->delete();
        return redirect()->back();
    }
}
