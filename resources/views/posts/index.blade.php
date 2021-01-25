@extends('layouts.main-content')
<!-- Set page title -->
@section ('page-title')
    <title>Homepage</title>
@endsection
<!-- set main content -->
@section ('main-content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            @forelse ($posts as $post)
                <h2 class="display-4">{{$post['title']}}</h2>
                <h5 class="display-4">{{$post['author']}}</h5>
                <small class="display-4">{{$post['created_at']}}</small>
                @empty
                <h5>There's no Posts <a href="{{ route('posts.create') }}">Create a new one</a></h5>
            @endforelse
        </div>
    </div>
@endsection