@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <button
                        type="button"
                        class="btn btn-success"
                        onclick="window.location='{{ route('airplanes.create') }}'">Add
                    </button>
                </div>
            </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Model ID</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data['id'] }}</th>
                            <th scope="col">{{ $data['name'] }}</th>
                            <th scope="col">{{ $data['airplane_model']['name'] }}</th>
                            <th scope="col">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('airplanes.show', $data['id']) }}"
                                            class="btn btn-primary mr-1"
                                            role="button">Show
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('airplanes.edit', $data['id']) }}"
                                            class="btn btn-outline-info mr-1"
                                            role="button">Update
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <form action="{{ route('airplanes.destroy', $data['id']) }}" method="post">
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
    </div>
</div>
@endsection

