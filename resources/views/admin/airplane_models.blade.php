@extends('layouts.admin_ui')

@section('content')
@include('admin.modals.airplane_model')
<div class="container">
    <div class="">
        <div class="">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addNewModel">
                        Add Airplane Model
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Model Name</th>
                            <th scope="col">Economy class seats</th>
                            <th scope="col">Business class seats</th>
                            <th scope="col">First class seats</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collection as $data)
                        <tr>
                            <th scope="row">{{ $data['id'] }}</th>
                            <th scope="col">{{ $data['name'] }}</th>
                            <th scope="col">{{ $data['number_of_economy_class_seats'] }}</th>
                            <th scope="col">{{ $data['number_of_businessmen_seats'] }}</th>
                            <th scope="col">{{ $data['number_of_first_class_seats'] }}</th>
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


<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).on('click', 'a.jquery-postback', function(e) {
        e.preventDefault(); // does not go through with the link.
    
        var $this = $(this);
    
        $.post({
            type: $this.data('method'),
            url: $this.attr('href')
        }).done(function (data) {
            alert('success');
            console.log(data);
        });
    });
</script>

