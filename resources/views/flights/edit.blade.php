@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-fighter-jet"></i> Flights</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('flights.index') }}">Flights</a></li>
        <li class="breadcrumb-item"><a href="{{ route('flights.edit', $collection->id) }}">Edit</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Edit flight</h3>
    <div class="tile-body">
        <form
            action="{{ route('flights.update', $collection->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Date takeoff</label>
                <input
                    class="form-control"
                    type="date"
                    id="date_take_off"
                    name="date_take_off"
                    value="{{ $collection->date_take_off }}"
                    autofocus>
            </div>
            <div class="form-group">
                <label>Date landing</label>
                <input
                    class="form-control"
                    type="date"
                    id="date_landing"
                    name="date_landing"
                    value="{{ $collection->date_landing }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input
                    class="form-control"
                    type="status"
                    id="status"
                    name="status"
                    value="{{ $collection->status }}">
            </div>
            <div class="form-group">
                <label>Select Airplane</label>
                <select
                    class="form-control"
                    id="airplane_id"
                    name="airplane_id">
                    @foreach($collection['airplanes'] as $data)
                        @if($data['id'] == $collection->airplane_id)
                            <option value="{{ $data['id'] }}" selected>{{ $data['name'] }}</option>
                        @else
                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Airport tackoff</label>
                <select
                    class="form-control"
                    id="take_off_airport_id"
                    name="take_off_airport_id">
                    @foreach($collection['airports_takeoff'] as $data)
                        @if($data['id'] == $collection->take_off_airport_id)
                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                        @else
                        <option value="{{ $data['id'] }}" selected>{{ $data['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Select Airports landing</label>
                <select
                    class="form-control"
                    id="landing_airport_id"
                    name="landing_airport_id">
                    @foreach($collection['airports_landing'] as $data)
                        @if($data['id'] == $collection->landing_airport_id)
                            <option value="{{ $data['id'] }}" selected>{{ $data['name'] }}</option>
                        @else
                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Price</label>
                <select
                    class="form-control"
                    id="price_id"
                    name="price_id">
                    @foreach($collection['prices'] as $data)
                        @if($data['id'] == $collection->price_id)
                            <option value="{{ $data['id'] }}" selected>{{ $data['name'] }}</option>
                        @else
                            <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Flight Image</label><br>
                <img class="user-img" src="{{ asset($collection->photo) }}" style="height: 100px;width: 100px;">
                <input class="form-control-file" id="photo" name="photo" type="file" aria-describedby="fileHelp">
            </div>
            <div class="tile-footer">
                <button
                    type="button"
                    class="btn btn-light"
                    onclick="window.location='{{ route('flights.index') }}'">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>Save change</button>
            </div>
        </form>
    </div>
</div>
@endsection

