@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($categories as $cat)
            <div class="col-md-12">
                <h2 style="color:blue"> {{$cat->category_name}} </h2>
                <div class="jumbotron">
                    <div class="row">
                        @foreach($cat->foods as $food)
                            <div class="col-md-3">
                                <img src="{{ asset('images') }}/{{$food->food_image}}" width="200" height="155" class="img-thumbnail">
                                <p class="text-center">
                                    {{$food->food_name}}
                                    <span>${{ $food->food_price }}</span>
                                </p>
                                <p class="text-center">
                                    <a href="{{ route('food.show',[$food->id]) }}">
                                        <button class="btn btn-outline-dark btn-block"> Details </button>
                                    </a>
                                </p>    
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
