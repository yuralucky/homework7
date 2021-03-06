@extends('./layout')

@section('title', 'List posts')

@section('content')
    <h1>List posts</h1>
    <div class="d-grid gap-1">
        <a type="submit" href="/post/create" class="btn btn-primary">Add new post</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="col-sm-2">#</th>
            <th class="col-sm-4">Title</th>
            <th class="col-sm-4">Slug</th>
            <th class="col-sm-2 ">Acting</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td><a href="/post/{{$post->id}}/edit/" class="btn btn-info">Edit</a><a
                            href="/post/{{$post->id}}/destroy/" class="btn btn-danger">Delete</a></td>
            </tr>
        @empty
            <p>No posts</p>
        @endforelse

        </tbody>
    </table>
    @include('pagination.pagination',['pages'=>$posts,'url'=>'posts'])

@endsection