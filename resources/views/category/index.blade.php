@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    All Categories
                    <span class="float-right">
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-sm btn-outline-secondary">Add Category</button>
                        </a>
                    </span>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($categories) > 0)
                            @foreach($categories as $key=>$cat)
                                <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $cat->category_name }}</td>
                                <td>
                                    <a href="{{ route('category.edit',$cat->id) }}">
                                        <button class="btn btn-outline-success">Edit</button>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal{{$cat->id}}">
                                        Delete
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('category.destroy',[$cat->id]) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure to delete this category?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4"> No category to display</td>
                        @endif
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
