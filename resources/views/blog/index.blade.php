@extends('layout')
@section('dashboard-content')

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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Blog Posts</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Blog Post Title</th>
                            <th>Blog Post Details</th>
                            <th>Blog Post Featured Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Blog Post Title</th>
                            <th>Blog Post Details</th>
                            <th>Blog Post Featured Photo</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($blogPosts as $blogPost)
                            <tr>
                                <td>{{ $blogPost->title }}</td>
                                <td>{!! $blogPost->details !!}</td>
                                <td><img src="{{ $blogPost->featured_image_url }}" width="100" height="100"></td>
                                <td>
                                    <a href="{{ URL::to('edit-blog-post') }}/{{ $blogPost->id }}"
                                        class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a href="{{ URL::to('delete-blog-post') }}/{{ $blogPost->id }}"
                                        class="btn btn-outline-danger btn-sm" onclick="return checkDelete()">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function checkDelete() {
            var check = confirm('Are you sure you want to delete this?');
            if (check) {
                return true;
            }
            return false;
        }
    </script>

@stop
