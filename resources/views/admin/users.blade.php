@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <div class="card">
                <div class="card-header">
                    <button
                        type="button"
                        class="btn btn-light"
                        onclick="window.location='{{ route('airplane_models.create') }}'">Creat
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data['id'] }}</th>
                            <th scope="col">{{ $data['name'] }}</th>
                            <th scope="col">{{ $data['email'] }}</th>
                            <th scope="col">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="{{ route('superadmin.user.show', $data['id']) }}" class="btn btn-info mr-1" role="button">Show</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('superadmin.user.edit', $data['id']) }}" class="btn btn-info mr-1" role="button">Update</a>
                                    </li>
                                    <li class="nav-item">
                                    <form action="{{ route('superadmin.user.destroy', $data['id']) }}" method="post">
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