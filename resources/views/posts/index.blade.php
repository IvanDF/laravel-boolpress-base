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
            <div class="card text-center mt-5 mb-5">
                <div class="card-header bg-primary text-white">
                    {{$post->author}}
                </div>
                <div class="card-body bg-transparent text-dark">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <a class="btn btn-primary" href="{{ route('posts.show', $post->slug) }}">Show</a>
                </div>
                <div class="card-footer text-muted bg-primary">
                    <small class="text-white">
                        {{$post->created_at->format('d/m/Y')}}
                    </small>
                </div>
            </div>
            @empty
            <h5>There's no Posts <a href="{{ route('posts.create') }}">Create a new one</a></h5>
        @endforelse
        <div class="mx-auto mt-5 mb-5" style="width: 250px">
            {{$posts->links()}}
        </div>
        </div>
@endsection