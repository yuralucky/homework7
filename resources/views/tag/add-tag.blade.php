@extends('layout')

@section('title', 'Add new post')

@section('content')

    <h1>Add new tag</h1>

    <form method="post" action="/tag/create">
        @isset($_SESSION['errors']['title'])
            @foreach($_SESSION['errors']['title'] as $error)
                <div class="alert alert-danger">{{$error}}</div>                @endforeach
        @endisset
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                   value="">
        </div>
        @isset($_SESSION['errors']['slug'])
            @foreach($_SESSION['errors']['slug'] as $error)
                <div class="alert alert-danger">{{$error}}</div>                @endforeach
        @endisset
            @php
                unset($_SESSION['errors'])
            @endphp
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="">
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-primary">Add new tag</button>
        </div>
    </form>
@endsection