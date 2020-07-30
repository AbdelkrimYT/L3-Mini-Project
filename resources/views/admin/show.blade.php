@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Users </div>
                    <label>Name: {{ $collection->name }}</label>
                    <label>Email: {{ $collection->email }} </label>
            </div>
        </div>
    </div>
</div>
@endsection