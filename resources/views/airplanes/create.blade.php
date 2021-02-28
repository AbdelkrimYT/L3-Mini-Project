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
        <li class="breadcrumb-item"><a href="{{ route('airplanes.create') }}">Add</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Add new airplane</h3>
    <div class="tile-body">
        <form action="{{ route('airplanes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="name"
                    autocomplete="off"
                    placeholder="Name">
            </div>
            <div class="form-group">
                <label>Select Model</label>
                <select
                    class="form-control"
                    id="model_id"
                    name="model_id">
                    @foreach($collection as $data)
                        <option value="" selected disabled hidden>Choose here</option>
                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Model Image</label><br>
                <input class="form-control-file" id="photo" name="photo" type="file" aria-describedby="fileHelp">
            </div>
            <div class="tile-footer">
                <button
                    type="button"
                    class="btn btn-light"
                    onclick="window.location='{{ route('airplanes.index') }}'">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>Save change</button>
            </div>
        </form>
    </div>
</div>
@endsection
