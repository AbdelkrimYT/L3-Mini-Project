@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-fighter-jet"></i> Airplane</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplanes.index') }}">Airplane</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airplanes.edit', $collection->id) }}">Edit</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Edit airplane</h3>
    <div class="tile-body">
        <form
            action="{{ route('airplanes.update', $collection->id) }}"
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
                    autocomplete="off"
                    placeholder="Name">
            </div>
            <div class="form-group">
                <label>Select Model</label>
                <select
                    class="form-control"
                    id="model_id"
                    name="model_id">
                    @foreach($collection->airplaneModel->get() as  $data)
                        @if ($data->id == $collection->model_id)
                            <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                        @else
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endif
                    @endforeach
                </select>
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

