@extends('layout')
@section('dashboard-content')
    <h1> Update category form</h1>

    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('failed') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('update-category') }}/{{ $category->id }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" value="{{ $category->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter category name" name="categoryName" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop
