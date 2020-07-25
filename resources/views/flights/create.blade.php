@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <h1>Creat</h1>
    <form action="{{ route('flights.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Date takeoff</label>
            <input class="form-control" type="date" id="date_take_off" name="date_take_off">
        </div>
        <div class="form-group">
            <label>Date landing</label>
            <input class="form-control" type="date" id="date_landing" name="date_landing">
        </div>
        <div class="form-group">
            <label>Select Airplane</label>
            <select
                class="form-control"
                id="airplane_id"
                name="airplane_id">
                @foreach($collection['airplanes'] as $data)
                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
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
                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
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
                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
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
                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('flights.index') }}'">Go back
            </button>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </div>
    </form>
</div>
@endsection

