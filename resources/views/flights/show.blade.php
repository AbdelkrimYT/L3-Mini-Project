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
        <li class="breadcrumb-item"><a href="{{ route('flights.show', $collection->id) }}">Show</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Flight details</h3>
    <div class="tile-body">
        <div class="form-group">
            <label>flight Image</label><br>
            <img class="user-img" src="{{ asset($collection->photo) }}" style="height: 100px;width: 100px;">
        </div>
        <ul class="list-group">
            <li class="list-group-item">Date takeoff: {{ $collection->date_take_off }}</li>
            <li class="list-group-item">Date landing: {{ $collection->date_landing }}</li>
            <li class="list-group-item">Status: {{ $collection->status }}</li>
            <li class="list-group-item">Takeoff airport: {{ $collection->airport_takeoff->name }}</li>
            <li class="list-group-item">Landing airport: {{ $collection->airport_landing->name }}</li>
            <li class="list-group-item">
                Airplane: {{ $collection->airplane->name }}
                (model {{ $collection->airplane->airplaneModel->name }})
            </li>
            <li class="list-group-item">
                Price:
                <ul class="list-group">
                    <li class="list-group-item">Economic class: ${{ $collection->price->economic_class_price }}</li>
                    <li class="list-group-item">Business class: ${{ $collection->price->business_class_price }}</li>
                    <li class="list-group-item">Firste class: ${{ $collection->price->firste_class_price }}</li>
                </ul>
            </li>
            <li class="list-group-item">
                Reserved
                <ul class="list-group">
                    <li class="list-group-item">Economic class: {{ $collection->reserved_economy_class }}</li>
                    <li class="list-group-item">Business class: {{ $collection->reserved_businessmen_class }}</li>
                    <li class="list-group-item">Firste class: {{ $collection->reserved_first_class }}</li>
                </ul>
            </li>
            </li>
        </ul>
        <div class="tile-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('flights.index') }}'">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
            </button>
        </div>
    </div>
</div>
@endsection