@extends("layaout")

@section('title')
    post {{ $post->id }}
@endsection

@section('content')
    <div class="card text-center">
        <div class="card-header">
            Post details
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $post['title'] }}</h4>
            <p class="card-text">{{ $post['description'] }}</p>
            <hr />
            <h5>Posted by</h5>
            <h3>{{ $post->user->name }}</h3>

            <a href="{{ route('posts.index') }}" class="btn btn-primary">back to all posts</a>
        </div>
    </div>
@endsection

</body>

</html>
