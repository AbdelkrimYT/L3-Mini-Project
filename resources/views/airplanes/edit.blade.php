@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <h1>Add new airplane</h1>
    <form action="{{ route('airplanes.update', $collection['id']) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Name</label>
            <input
                type="text"
                class="form-control"
                value="{{ $collection['name'] }}"
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
                @foreach($airplane_model_list as $data)
                    @if ($data['id'] == $collection['model_id'])
                        <option value="{{ $data['id'] }}" selected>{{ $data['name'] }}</option>
                    @else
                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                    @endif
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

