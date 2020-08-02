@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Price Edit</h1>
    <form action="{{ route('prices.update', $collection['id']) }}" method="POST">
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
            <label>Economic class</label>
            <input
                type="text"
                class="form-control"
                value="{{ $collection['economic_class_price'] }}"
                id="economic_class_price"
                name="economic_class_price"
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>Business class</label>
            <input
                type="text"
                class="form-control"
                value="{{ $collection['business_class_price'] }}"
                id="business_class_price"
                name="business_class_price"
                autocomplete="off">
        </div>
        <div class="form-group">
            <label>Firste class</label>
            <input
                type="text"
                class="form-control"
                value="{{ $collection['firste_class_price'] }}"
                id="firste_class_price"
                name="firste_class_price"
                autocomplete="off">
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('prices.index') }}'">Go back
            </button>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </div>
    </form>
</div>
@endsection