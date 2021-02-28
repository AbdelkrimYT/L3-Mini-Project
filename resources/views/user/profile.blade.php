@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="name" value="{{ Auth::user()->name }}" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
        <input type="email" value="{{ Auth::user()->email }}" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <div class="form-group">
            <input type="file" name="photo" id="photo">
            <input type="submit" value="Upload Image" name="submit">
            <img src="{{ Auth::user()->avatar }}" alt="..." class="img-thumbnail" width="100%">
        </div>
    </form>
</div>
@endsection
