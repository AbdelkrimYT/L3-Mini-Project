@extends('layouts.admin_ui')

@section('content')
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="{{ asset('admin') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Admin</a>
            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="{{ asset('home') }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Home</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('Admin Dashboard') }}</div>
								Hallo ich bin IIS
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $d)
                                    <tbody>
                                        <tr>
                                            <th scope="row">{{ $d['id'] }}</th>
                                            <td>{{ $d['number_of_economy_class_seats'] }}</td>
                                            <td>{{ $d['number_of_businessmen_seats'] }}</td>
                                            <td>{{ $d['name'] }}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                {{ __('You are logged in as Admin!') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

