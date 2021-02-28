@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-money"></i> Price</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('prices.index') }}">Prices</a></li>
        <li class="breadcrumb-item"><a href="{{ route('prices.edit', $collection->id) }}">Edit</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Edit airplane</h3>
    <div class="tile-body">
        <form action="{{ route('prices.update', $collection->id) }}" method="POST">
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
            <div class="tile-footer">
                <button
                    type="button"
                    class="btn btn-light"
                    onclick="window.location='{{ route('prices.index') }}'">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>Go back
                </button>
                <button class="btn btn-primary" type="submit">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i>Save change</button>
            </div>
        </form>
    </div>
</div>
@endsection