@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-fighter-jet"></i> Flights</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('flights.index') }}">Flights</a></li>
    </ul>
</div>
<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">
            <button
                type="button"
                class="btn btn-primary"
                onclick="window.location='{{ route('flights.create') }}'">
                <i class="fa fa-plus" aria-hidden="true"></i>Add
            </button>
        </h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date takeoff</th>
                        <th scope="col">Date landing</th>
                        <th scope="col">Status</th>
                        <th scope="col">Takeoff A</th>
                        <th scope="col">Landing A</th>
                        <th scope="col">R.economy</th>
                        <th scope="col">R.business</th>
                        <th scope="col">R.first</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($collection as $data)
                    <tr>
                        <th scope="row">{{ $data->id }}</th>
                        <th scope="col">{{ $data->date_take_off }}</th>
                        <th scope="col">{{ $data->date_landing }}</th>
                        <th scope="col">{{ $data->status }}</th>
                        <th scope="col">{{ $data->airport_takeoff->name }}</th>
                        <th scope="col">{{ $data->airport_landing->name }}</th>
                        <th scope="col">{{ $data->tickets->sum('reserved_economy_class') }}</th>
                        <th scope="col">{{ $data->tickets->sum('reserved_businessmen_class') }}</th>
                        <th scope="col">{{ $data->tickets->sum('reserved_first_class') }}</th>
                        <th scope="col">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a
                                        href="{{ route('flights.show', $data->id) }}"
                                        class="btn btn-primary mr-1"
                                        role="button"><i class="fa fa-eye"></i> Show
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a
                                        href="{{ route('flights.edit', $data->id) }}"
                                        class="btn btn-warning mr-1"
                                        role="button"><i class="fa fa-pencil"></i> Edit
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form action="{{ route('flights.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

