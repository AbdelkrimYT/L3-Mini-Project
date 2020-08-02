@extends('layouts.admin')

@section('content')
<button
    type="button"
    class="btn btn-light"
    onclick="window.location='{{ route('prices.index') }}'">Return
</button>
@endsection