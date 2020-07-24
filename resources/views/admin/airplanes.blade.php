@extends('layouts.admin_ui')

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header"><button type="button" class="btn btn-outline-success">Add Air</button>
            </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Model Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data['id'] }}</th>
                            <th scope="col">{{ $data['name'] }}</th>
                            <th scope="col">{{ $data['model_id'] }}</th>
                            <th scope="col">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="airplane_model/{{ $data['id'] }}" class="btn btn-info mr-1" role="button">Update</a>
                                    </li>
                                    <li class="nav-item">
                                    <form action="{{ '/' }}" method="post">
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

