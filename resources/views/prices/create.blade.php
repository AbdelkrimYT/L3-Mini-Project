@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <form
        action="{{ route('prices.store') }}"
        method="post">
        @csrf
        @method('post')
        <div
            class="form-group">
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
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('prices.index') }}'">Return
            </button>
            <button type="submit" class="btn btn-outline-success">Add</button>
        </div>
    </form>
</div>
@endsection
