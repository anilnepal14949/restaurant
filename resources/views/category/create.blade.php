@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Add Food Category
                        <span class="float-right">
                            <a href="{{ route('category.index') }}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View All Categories</button>
                            </a>
                        </span>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="category_name"> Name </label>
                            <input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" placeholder="Enter category name...">

                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
