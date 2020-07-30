@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <form action="{{ route('food.update',[$food->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="card">
                    <div class="card-header">Update Food</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="food_name"> Name: </label>
                            <input type="text" name="food_name" class="form-control @error('food_name') is-invalid @enderror" placeholder="Enter food name..." value="{{ $food->food_name }}">
                            @error('food_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="food_desc"> Description: </label>
                            <textarea name="food_desc" class="form-control @error('food_desc') is-invalid @enderror" placeholder="Enter description...">{{ $food->food_desc }}</textarea>
                            @error('food_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="food_price"> Price: </label>
                            <input type="number" name="food_price" class="form-control @error('food_price') is-invalid @enderror" placeholder="Enter price..." value="{{ $food->food_price }}">
                            @error('food_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id"> Select Category: </label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option value="0">Select Category...</option>
                                @foreach(App\Category::all() as $cat)
                                    <option value="{{$cat->id}}" @if($cat->id == $food->category_id) selected @endif>{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="food_image"> Image: <img src="{{ asset('images') }}/{{$food->food_image}}" width="50"></label>
                            <input type="file" name="food_image" class="form-control @error('food_image') is-invalid @enderror">
                            @error('food_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
