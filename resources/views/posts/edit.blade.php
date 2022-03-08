@extends("layouts.app")

@section('title')
    Edit Post
@endsection

@section('main-content')
    <form class="form-control" action="{{ route('posts.update', $post->id) }}" method="Post">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $post['title'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $post['description'] }}">
        </div>

        {{-- <div class="mb-3">
            <label class="form-label">Posted by</label>
            <select name="user_id" id="users" class="form-select" aria-label="Default select example">
                @foreach ($users as $user)
                    <option {{ $user->id == $post->user_id ? 'selected' : '' }} value="{{ $user->id }}">
                        {{ $user->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection
