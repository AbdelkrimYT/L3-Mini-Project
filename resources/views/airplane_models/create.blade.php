@extends('layouts.admin_ui')
@section('content')
@include('airplane_models.modal')
<div class="container">
    <form
        action="{{ route('airplane_models.store') }}"
        method="post">
        @csrf
        @method('post')
        <div
            class="form-group">
            <label>Model Name</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="name" name="name"
                autofocus>
        </div>
        <div class="form-group">
            <label>Number of economy class seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_economy_class_seats"
                name="number_of_economy_class_seats"
                placeholder="0">
        </div>
        <div class="form-group">
            <label>Number of businessmen seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_businessmen_seats"
                name="number_of_businessmen_seats"
                autofocus placeholder="0">
        </div>
        <div class="form-group">
            <label>Number of first class seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_first_class_seats"
                name="number_of_first_class_seats"
                autofocus placeholder="0">
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airplane_models.index') }}'">Return
            </button>
            <button type="submit" class="btn btn-outline-success">Add</button>
        </div>
    </form>
</div>
@endsection
