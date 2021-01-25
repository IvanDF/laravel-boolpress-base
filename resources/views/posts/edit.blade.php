@extends('layouts.main-content')
<!-- Set page title -->
@section ('page-title')
    <title>Homepage</title>
@endsection
<!-- set main content -->
@section ('main-content')
    <div class="container">
        <h2>Edit: {{$post->title}}</h2>

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

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input class="form-control" type="text" name="author" id="author" value="{{ old('author', $post->author) }}">
            </div>
            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" type="text" name="body" id="body" cols="30" rows="10">{{ old('body', $post->body) }}</textarea>
            </div>
            <div class="form-group">
                <label for="img_url">Image</label>
                @isset ($post->img_url)
                    <div class="wrap-image">
                        <img width="200" src="{{ asset('storage/' . $post->img_url)}}" alt="{{$post->title}}">
                    </div>
                @endisset
                <input class="form-control" type="file" name="img_url" id="img_url" accept="image/*">
            </div>
            <div class="form-group">
                <input class="btn btn-dark" type="submit" value="Update post">
            </div>
        </form>
    </div>
@endsection