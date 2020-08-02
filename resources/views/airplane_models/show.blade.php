@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-fighter-jet"></i> Airplane Models</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplane_models.index') }}">Airplane Models</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplane_models.show', $collection->id) }}">Show</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Airplane model details</h3>
    <div class="tile-body">
        <div class="form-group">
            <label>Image</label><br>
            <img class="user-img" src="{{ asset($collection->photo) }}" style="height: 100px;width: 100px;">
        </div>
        <div class="form-group">
            <label>Model Name</label>
            <input
                type="text" disabled
                autocomplete="off"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->name }}">
        </div>
        <div class="form-group">
            <label>Number of economy class seats</label>
            <input
                type="text" disabled
                autocomplete="off"
                class="form-control"
                id="number_of_economy_class_seats"
                name="number_of_economy_class_seats"
                value="{{ $collection->number_of_economy_class_seats }}">
        </div>
        <div class="form-group">
            <label>Number of businessmen seats</label>
            <input
                type="text" disabled
                autocomplete="off"
                class="form-control"
                id="number_of_businessmen_seats"
                name="number_of_businessmen_seats"
                value="{{ $collection->number_of_businessmen_seats }}">
        </div>
        <div class="form-group">
            <label>Number of first class seats</label>
            <input
                type="text" disabled
                autocomplete="off"
                class="form-control"
                id="number_of_first_class_seats"
                name="number_of_first_class_seats"
                value="{{ $collection->number_of_first_class_seats }}">
        </div>
        <div class="tile-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airplane_models.index') }}'">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
            </button>
        </div>
    </div>
</div>
@endsection