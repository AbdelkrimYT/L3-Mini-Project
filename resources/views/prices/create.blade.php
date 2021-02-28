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
        <li class="breadcrumb-item"><a href="{{ route('prices.create') }}">Add</a></li>
    </ul>
</div>
<div class="tile">
    <h3 class="tile-title">Add new price</h3>
    <div class="tile-body">
        <form action="{{ route('prices.store') }}" method="POST">
            @csrf
            <div class="form-group">
            <label>Price Name</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="name"
                name="name"
                autofocus>
        </div>
        <div class="form-group">
            <label>Economy class seats price</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="economic_class_price"
                name="economic_class_price"
                placeholder="0">
        </div>
        <div class="form-group">
            <label>Businessmen seats price</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="business_class_price"
                name="business_class_price"
                autofocus placeholder="0">
        </div>
        <div class="form-group">
            <label>First class seats price</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="firste_class_price"
                name="firste_class_price"
                autofocus placeholder="0">
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
