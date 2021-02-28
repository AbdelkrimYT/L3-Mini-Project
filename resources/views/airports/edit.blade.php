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
        <li class="breadcrumb-item"><a href="{{ route('airports.edit', $collection->id) }}">Edit</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Edit airplane</h3>
    <div class="tile-body">
        <form
            action="{{ route('airports.update', $collection->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Name</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $collection->name }}"
                    id="name"
                    name="name"
                    autocomplete="off">
            </div>
            <div class="form-group">
                <label>State</label>
                <input
                    type="text"
                    class="form-control"
                    value="{{ $collection->state }}"
                    id="state"
                    name="state"
                    autocomplete="off">
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
                    onclick="window.location='{{ route('airports.index') }}'">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>Save change</button>
            </div>
        </form>
    </div>
</div>
@endsection

