@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-users"></i> Users</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.users') }}">Users</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.user.show', $collection['id']) }}">Show</a></li>
    </ul>
</div>


<div class="row user">
    <div class="col-md-12">
        <div class="profile">
            <div class="info">
                <img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
                <h4>{{ $collection->name }}</h4>
                <p>FrontEnd Developer</p>
            </div>
        <div class="cover-image">
        </div>
        </div>
        <h4>{{ $collection->email }}</h4>
    </div>
</div>
@endsection