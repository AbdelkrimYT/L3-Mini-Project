@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-flag"></i> Airports</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airports.show', $collection->id) }}">Show</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Airports details</h3>
    <div class="tile-body">
        <div class="form-group">
            <label>Airports Image</label><br>
            <img class="user-img" src="{{ asset($collection->photo) }}" style="height: 100px;width: 100px;">
        </div>
        <div class="form-group">
            <label>Airports Name</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->name }}"
                disabled
                placeholder="Name">
        </div>
        <div class="form-group">
            <label>Airports State</label>
            <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->state}}"
                disabled
                placeholder="Name">
        </div>
        <div class="tile-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airports.index') }}'">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
            </button>
        </div>
    </div>
</div>
@endsection

