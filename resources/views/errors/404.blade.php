@extends('layouts.main-content')
<!-- Set page title -->
@section ('page-title')
    <title>Homepage</title>
@endsection
<!-- set main content -->
@section ('main-content')
    <div class="jumbotron text-center">
        <h1 class="display-1 big-title">404</h1>
        <p class="lead">error, page not found</p>
        <hr class="my-4">
        <p class="lead">The page: </p>
        <p class="small">
            <?php echo Request::url() ?>
        </p>
        <p class="lead">does not exist</p>
        <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}" role="button">Return to Posts</a>
    </div>
@endsection