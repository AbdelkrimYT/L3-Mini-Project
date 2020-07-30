@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <button
                type="button"
                class="btn btn-success"
                onclick="window.location='{{ route('flights.create') }}'">Add
            </button>
        </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date take off</th>
                            <th scope="col">Date landing</th>
                            <th scope="col">Status</th>
                            <th scope="col">Take off airport</th>
                            <th scope="col">Landing airport</th>
                            <th scope="col">airplane</th>
                            <th scope="col">Price</th>
                            <th scope="col">reserved economy</th>
                            <th scope="col">reserved businessmen</th>
                            <th scope="col">reserved first</th>
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
                            <th scope="col">{{ $data->airplane->name }}</th>
                            <th scope="col">{{ $data->price->name }}</th>
                            <th scope="col">{{ $data->reserved_economy_class }}</th>
                            <th scope="col">{{ $data->reserved_businessmen }}</th>
                            <th scope="col">{{ $data->reserved_first_class }}</th>
                            <th scope="col">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('flights.show', $data['id']) }}"
                                            class="btn btn-primary mr-1"
                                            role="button">Show
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('flights.edit', $data['id']) }}"
                                            class="btn btn-outline-info mr-1"
                                            role="button">Update
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{ route('flights.destroy', $data['id']) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
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
@endsection

