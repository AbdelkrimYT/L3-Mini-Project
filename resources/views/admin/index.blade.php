@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon">
            <i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Users</h4>
                <p><b>{{ $collection['users'] }}</b></p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-plane fa-3x"></i>
            <div class="info">
                <h4>Airplanes</h4>
                <p><b>{{ $collection['airplanes'] }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-flag fa-3x"></i>
            <div class="info">
                <h4>Flights</h4>
                <p><b>{{ $collection['flights'] }}</b></p>
            </div>
        </div>
    </div>
</div>
@endsection

