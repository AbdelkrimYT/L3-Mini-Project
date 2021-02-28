@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-ticket"></i> Tickets</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Tickets</a></li>
    </ul>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">
                Tickets Table
            </h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Flight Name</th>
                            <th scope="col">Reserved economy class</th>
                            <th scope="col">Reserved businessmen class</th>
                            <th scope="col">Reserved first class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <th scope="row">{{ $data->user->name }}</th>
                            <th scope="col">{{ $data->flight->name }}</th>
                            <th scope="col">{{ $data->reserved_economy_class }}</th>
                            <th scope="col">{{ $data->reserved_businessmen_class }}</th>
                            <th scope="col">{{ $data->reserved_first_class }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

