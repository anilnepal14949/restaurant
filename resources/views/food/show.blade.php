@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images') }}/{{$food->food_image}}" class="img-responsive">
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Food Details</div>

                <div class="card-body">
                    <h2> {{ $food->food_name }} </h2>
                    <p class="lead"> {{ $food->food_desc }} </p>
                    <h4> ${{ $food->food_price }} </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
