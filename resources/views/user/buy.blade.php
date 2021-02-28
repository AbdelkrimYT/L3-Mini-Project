@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <button type="button" class="btn btn-light" onclick="window.location='{{ route('user') }}'">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path fill-rule="evenodd" d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                    <path fill-rule="evenodd" d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                </svg> Go back
            </button>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Flight: {{ $collection->name }}</h5>
                <form action="{{ route('user.buying') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="number_economy_class">Selcet economy class palces (${{ $collection->price->economic_class_price }})</label>
                        <input class="form-control" type="number" value="0" data-decimals="2" min="0" tep="1" name="number_economy_class" id="number_economy_class">
                    </div>
                    <div class="form-group">
                        <label for="number_businessmen_class">Selcet businessmen class palces (${{ $collection->price->business_class_price }})</label>
                        <input class="form-control" type="number" value="0" data-decimals="2" min="0" tep="1" name="number_businessmen_class" id="number_businessmen_class">
                    </div>
                    <div class="form-group">
                        <label for="number_first_class">Selcet first class palces (${{ $collection->price->firste_class_price }})</label>
                        <input class="form-control" type="number" value="0" data-decimals="2" min="0" tep="1" name="number_first_class" id="number_first_class">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
