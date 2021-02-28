@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('user.search.post') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="from">From</label>
                    <select class="custom-select" name="take_off_airport_id" id="from" value="{{ old('take_off_airport_id') }}">
                        <option selected>Select your location</option>
                        @foreach($airport as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->state }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="to">To</label>
                    <select class="custom-select" name="landing_airport_id" id="to" value="{{ old('landing_airport_id') }}">
                        <option>Select the destination</option>
                        @foreach($airport as $item)
                            <option value="{{ $item->id }}">{{ $item->name }} / {{ $item->state }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="date_takeoff">Date</label>
                    <input class="form-control"  type="date" name="date_takeoff" id="date_takeoff" value="{{ old('date_takeoff') }}">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="date_takeoff_max">To</label>
                    <input class="form-control"  type="date" name="date_takeoff_max" id="date_takeoff_max" value="{{ old('date_takeoff_max') }}">
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
            @foreach ($collection as $index => $item)
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="{{ $item->photo  }}" alt="Image" style="height: 20em">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{ $item->name }}</h5>
                            <p class="card-text">
                                <label>
                                    From {{ $item->airport_takeoff->name }} ({{ $item->airport_takeoff->state }})
                                    to {{ $item->airport_landing->name }}  ({{ $item->airport_landing->state }})
                                </label>
                                <label>Airplane: {{ $item->airplane->name }}</label>
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
                @if ($index % 2 == 0 and $index >= 2)
                    </div>
                    <br>
                    <div class="row">
                @endif
            @endforeach
        </div>
            {{ $collection->links()  }}
    </div>
@endsection
