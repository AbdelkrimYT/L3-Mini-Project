@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <button
                type="button"
                class="btn btn-success"
                onclick="window.location='{{ route('airports.create') }}'">Add
            </button>
        </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">State</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data['id'] }}</th>
                            <th scope="col">{{ $data['name'] }}</th>
                            <th scope="col">{{ $data['state'] }}</th>
                            <th scope="col">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('airports.show', $data['id']) }}"
                                            class="btn btn-primary mr-1"
                                            role="button">Show
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('airports.edit', $data['id']) }}"
                                            class="btn btn-outline-info mr-1"
                                            role="button">Update
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <form action="{{ route('airports.destroy', $data['id']) }}" method="POST">
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

