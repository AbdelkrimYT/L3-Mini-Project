@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <h1>Add new airplane</h1>
    <form action="{{ route('airplanes.store') }}" method="POST">
        @csrf
        @method('post')
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
                    <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airplanes.index') }}'">Go back
            </button>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </div>
    </form>
</div>
@endsection

