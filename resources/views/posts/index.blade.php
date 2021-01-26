@extends('layouts.main-content')
<!-- Set page title -->
@section ('page-title')
    <title>Homepage</title>
@endsection
<!-- set main content -->
@section ('main-content')
        <div class="container mb-5">
        @if (session('deleted'))
        <div class="alert alert-danger">
            {{ session('deleted') }} succesfully deleted.
        </div>
        @endif
        @forelse($posts as $post)
                <h2 class="display-4 mt-5">{{$post->title}}</h2>
                <h5 class="display-4">{{$post->author}}</h5>
                <p class="display-4 small">{{$post->created_at->format('d/m/Y')}}</p>
                <a href="{{ route('posts.show', $post->slug) }}">Show</a>
                @empty
                <h5>There's no Posts <a href="{{ route('posts.create') }}">Create a new one</a></h5>
        @endforelse
        <div class="mx-auto mt-5 mb-5" style="width: 250px">
            {{$posts->links()}}
        </div>
        </div>
@endsection