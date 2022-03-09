@extends("layouts.app")
{{-- @dd($posts) --}}

@section('title')
    posts
@endsection

@section('main-content')
    <div class=" text-center">
        <a href="posts/create" class="btn btn-success mb-3 ">Add New Post </a>

        <table class="table table-dark text-light table-bordered text-center">
            <tr>
                <th> ID </th>
                <th> Title </th>
                <th> Description </th>
                <th> posted by </th>
                <th> slog </th>
                <th> View </th>
                <th> Edit </th>
                <th> Delete </th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td onclick="fun()">{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['description'] }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post['slug'] }}</td>
                    <td><a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">View </a></td>
                    <td>
                        @if (Auth::user()->id == $post->user_id)
                            <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Edit </a>
                        @else
                            not allowed
                        @endif

                    </td>
                    <td>
                        {{-- <a data-id={{ $post->id }} onclick="deletePost(event)" class="btn btn-warning">dekete ajax </a> --}}

                        @if (Auth::user()->id == $post->user_id)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">Delete</button>
                            </form>
                        @else
                            not allowed
                        @endif


                    </td>


                </tr>
            @endforeach

        </table>

        {{ $posts->links() }}

    </div>
@endsection

<script>
    function deletePost(e) {
        if (confirm("Are you sure?")) {
            let id = e.target.dataset.id;

            fetch("posts/" + id, {
                method: 'DELETE',
                headers: {
                    _token: "{{ csrf_token() }}",
                }
            })
        }
    }

    function confirmDelete(e) {
        if (!confirm("Are you sure?")) {
            e.preventDefault();
        }
    }
</script>

</body>

</html>
