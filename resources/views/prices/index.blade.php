@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-money"></i> Price</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('prices.index') }}">Prices</a></li>
    </ul>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">
                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="window.location='{{ route('prices.create') }}'">
                    <i class="fa fa-plus" aria-hidden="true"></i>Add
                </button>
            </h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Economic class</th>
                            <th scope="col">Business class</th>
                            <th scope="col">Firste class</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <th scope="col">{{ $data->name }}</th>
                            <th scope="col">${{ $data->economic_class_price }}</th>
                            <th scope="col">${{ $data->business_class_price }}</th>
                            <th scope="col">${{ $data->firste_class_price }}</th>
                            <th scope="col">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a
                                            href="{{ route('prices.edit', $data->id) }}"
                                            class="btn btn-warning mr-1"
                                            role="button"><i class="fa fa-pencil"></i> Edit
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="{{ route('prices.destroy', $data->id) }}" method="POST">
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
                {{ $collection->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

