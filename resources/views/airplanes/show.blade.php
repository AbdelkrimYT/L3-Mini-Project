@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-plane"></i> Airplane</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplanes.index') }}">Airplane</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplanes.show', $collection->id) }}">Show</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Airplane details</h3>
    <div class="tile-body">
        <div class="form-group">
            <label>Airplane Image</label><br>
            <img class="user-img" src="{{ asset($collection->photo) }}" style="height: 100px;width: 100px;">
        </div>
        <div class="form-group">
            <label>Airplane Name</label>
            <input
                type="text" disabled
                autocomplete="off"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->name }}">
        </div>
        <div class="form-group">
            <label>Airplane model</label>
            <input
                type="text" disabled
                autocomplete="off"
                class="form-control"
                id="number_of_economy_class_seats"
                name="number_of_economy_class_seats"
                value="{{ $collection->airplaneModel->name}}">
        </div>
        <div class="tile-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airplanes.index') }}'">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
            </button>
        </div>
    </div>
</div>
@endsection

