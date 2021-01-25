@extends('layouts.main-content')
<!-- Set page title -->
@section ('page-title')
    <title>Homepage</title>
@endsection
<!-- set main content -->
@section ('main-content')
    <div class="container">
        <h2>Create new post</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    <h6>{{$error}}</h6>
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input class="form-control" type="text" name="author" id="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" type="text" name="body" id="body" cols="30" rows="10">{{ old('body') }}</textarea>
            </div>
            <div class="form-group">
                <label for="img_url">Image</label>
                <input class="form-control" type="file" name="img_url" id="img_url" accept="image/*">
            </div>
            <div class="form-group">
                <input class="btn btn-dark" type="submit" value="Create post">
            </div>
        </form>
    </div>
@endsection