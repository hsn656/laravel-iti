@extends("layouts.app")

@section('title')
    new post
@endsection

@section('main-content')
    <form class="form-control" action="{{ route('posts.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" class="form-control">
        </div>

        <input hidden value="{{ Auth::user()->id }}" type="text" name="user_id" class="form-control">


        {{-- <div class="mb-3">
            <label class="form-label">Posted by</label>
            <select name="user_id" id="users" class="form-select" aria-label="Default select example">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <div class="mb-3 text-center">
            <input type="submit" class="btn btn-success">
        </div>

    </form>
@endsection
