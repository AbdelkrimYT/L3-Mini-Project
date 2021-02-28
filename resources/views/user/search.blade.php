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
        <form action="{{ route('user.search.post') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="from">From</label>
                    <select class="custom-select" name="take_off_airport_id" id="from" value="{{ Request::old('take_off_airport_id') }}">
                        <option>Select your location</option>
                        @foreach($collection as $item)
                            @if ($request->take_off_airport_id == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }} / {{ $item->state }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->state }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="to">To</label>
                    <select class="custom-select" name="landing_airport_id" id="to" value="{{ $request->landing_airport_id }}">
                        <option>Select the destination</option>
                        @foreach($collection as $item)
                            @if ($request->landing_airport_id == $item->id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }} / {{ $item->state }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->state }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="date_takeoff">Date</label>
                    <input class="form-control"  type="date" name="date_takeoff" id="date_takeoff" value="{{ $request->date_takeoff }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="date_takeoff_max">To</label>
                    <input class="form-control"  type="date" name="date_takeoff_max" id="date_takeoff_max" value="{{ $request->date_takeoff_max }}">
                </div>
                <div class="col-md-1 mb-3 d-flex d-inline-flex">
                    <button type="submit" class="btn btn-primary">
                        Search
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($result as $index => $item)
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="{{ $item->photo  }}" alt="Image" style="height: 20em">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">
                                <h3>{{ $item->airport_takeoff->name }}</h3>
                                <h3>{{ $item->airport_landing->name }}</h3>
                                <h3>{{ $item->airplane->name }}</h3>

                                <h5>Price</h5>
                                Economic ${{ $item->price->economic_class_price }}<br>
                                Business ${{ $item->price->business_class_price }}<br>
                                Firste ${{ $item->price->firste_class_price }}<br>
                            </p>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-primary" type="" href="{{ route('user.show.buying', $item->id) }}">
                                <span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                                    </svg>
                                </span> Buying
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($index % 3 == 0 and $index != 0)
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
    </div>
@endsection
