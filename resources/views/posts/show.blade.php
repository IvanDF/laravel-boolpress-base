@extends('layouts.main-content')
<!-- Set page title -->
@section ('page-title')
    <title>Homepage</title>
@endsection
<!-- set main content -->
@section ('main-content')
        <div class="container mb-5 mt-5">
            <h1>{{$post->title}}</h1>
            <h6 class="small">{{$post->author}}</h6>
            <h4>TAGS</h4>
            @forelse ($post->tags as $tag)
                <span class="badge badge-dark">{{ $tag->name }}</span>
            @empty
                <p>No actual tags for this post.</p>
            @endforelse
            <h6 class="small">{{$post->created_at->diffForHumans()}}</h6>
            @if (!empty($post->img_url)) 
                <img class="img-fluid" src="{{ asset('storage/' . $post->img_url)}}" alt="{{$post->title}}">
                @else
                <img class="img-fluid" src="{{ asset('storage/images/img-none.png')}}" alt="{{$post->title}}">
            @endif
            <p class="lead mt-4"> {{$post->body}}</p>
            <a class="btn btn-dark" href="{{ route('posts.edit', $post->slug)}}">Edit</a>
            <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete">
            </form>
        </div>
@endsection