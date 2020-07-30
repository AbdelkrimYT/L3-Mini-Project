@extends('layouts.admin_ui')
@section('content')
<div class="container">
    <form
        action="{{ route('airplane_models.update', $collection->id ) }}"
        method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Model Name</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="name"
                name="name"
                value="{{ $collection->name }}">
        </div>
        <div class="form-group">
            <label>Number of economy class seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_economy_class_seats"
                name="number_of_economy_class_seats"
                value="{{ $collection->number_of_economy_class_seats }}">
        </div>
        <div class="form-group">
            <label>Number of businessmen seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_businessmen_seats"
                name="number_of_businessmen_seats"
                value="{{ $collection->number_of_businessmen_seats }}">
        </div>
        <div class="form-group">
            <label>Number of first class seats</label>
            <input
                type="text"
                autocomplete="off"
                class="form-control"
                id="number_of_first_class_seats"
                name="number_of_first_class_seats"
                value="{{ $collection->number_of_first_class_seats }}">
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light"
                onclick="window.location='{{ route('airplane_models.index') }}'">Return
            </button>
            <button
                type="submit"
                class="btn btn-success">Save
            </button>
        </div>
    </form>
</div>
@endsection