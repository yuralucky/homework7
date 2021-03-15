@extends('layout')

@section('title', 'Add new post')

@section('content')

    <h1>Add new post</h1>

    <form method="post" action="/post/create">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                   value="">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Body</label>
            <input type="text" class="form-control" id="slug" name="body" value="">
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-primary">Add new post</button>
        </div>
    </form>
@endsection