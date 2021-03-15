@extends('layout')

@section('title', 'Update post')

@section('content')
        <h1>Update post</h1>

    <form method="post" action="/post/{{$post->id}}/update">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                   value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Body</label>
            <input type="text" class="form-control" id="slug" name="body" value="{{$post->body}}">
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-primary">Update post</button>
        </div>
    </form>
@endsection