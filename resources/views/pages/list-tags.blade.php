@extends('layout')

@section('title', 'Homepage')

@section('content')
    <h1>All tags</h1>
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
        @forelse($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td><a href="add-new-tag.php?id={{$tag->id}}" class="btn btn-info">Edit</a><a href="delete_tag.php?id={{$tag->id}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @empty
            <p>No categories</p>
        @endforelse

        </tbody>
    </table>
    <div class="d-grid gap-1">

        <a type="submit" href="add-new-tag.php" class="btn btn-primary">Add new tag</a>
    </div>
@endsection