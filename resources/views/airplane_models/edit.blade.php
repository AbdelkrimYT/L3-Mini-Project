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
        <li class="breadcrumb-item"><a href="{{ route('airplane_models.edit', $collection->id) }}">Edit</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Edit airplane model</h3>
    <div class="tile-body">
        <form
        action="{{ route('airplane_models.update', $collection->id ) }}"
        method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Model Name</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->name }}">
        </div>
        <div class="form-group">
            <label>Number of economy class seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_economy_class_seats"
                name="number_of_economy_class_seats"
                value="{{ $collection->number_of_economy_class_seats }}">
        </div>
        <div class="form-group">
            <label>Number of businessmen seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_businessmen_seats"
                name="number_of_businessmen_seats"
                value="{{ $collection->number_of_businessmen_seats }}">
        </div>
        <div class="form-group">
            <label>Number of first class seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_first_class_seats"
                name="number_of_first_class_seats"
                value="{{ $collection->number_of_first_class_seats }}">
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Model Image</label><br>
            <img class="user-img" src="{{ asset($collection->photo) }}" style="height: 100px;width: 100px;">
            <input class="form-control-file" id="photo" name="photo" type="file" aria-describedby="fileHelp">
        </div>
        <div class="tile-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airplane_models.index') }}'">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
            </button>
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-floppy-o" aria-hidden="true"></i>Save change</button>
        </div>
    </form>
    </div>
</div>
@endsection