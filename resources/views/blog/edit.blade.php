@extends('layout')
@section('dashboard-content')
    <h1> Create blog post form</h1>

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

    <form action="{{ URL::to('update-blog-post') }}/{{ $blogPost->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Enter blog title" name="blogTitle" value="{{ $blogPost->title }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Details <span class="text-danger">*</span></label>
            <textarea name="blogDetails" class="form-control" id="editor">{{ $blogPost->details }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select Category <span class="text-danger">*</span></label>
            <select name="category" class="form-control">
                <option disabled selected hidden>Select</option>
                @foreach ($categories as $category)
                    <option @if ($category->id == $blogPost->category_id) selected @endif value="{{ $category->id }}">
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Select Featured Photo</Select></label>
            <input type="file" class="form-control" name="featuredPhoto" accept="image/png, image/jpeg"
                onchange="loadPhoto(event)">
        </div>
        <div class="form-group">
            <img id="photo" height="100" width="100" src="{{ $blogPost->featured_image_url }}">
        </div>
        <button type="submit" class="btn btn-primary" onclick="return validateBlogDetails()">Submit</button>
    </form>

    <script>
        function validateBlogDetails() {
            var editor = CKEDITOR.instances.editor.editable().getText();
            if (editor.trim() === "") {
                alert("Please fill out required fields!");
                return false;
            }
            return true;
        }

        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('photo');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@stop
