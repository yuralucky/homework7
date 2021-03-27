@extends('layout')

@section('title', 'List posts')

@section('content')
    <h1>List tags</h1>
    <div class="d-grid gap-1">
        <a type="submit" href="/tag/create" class="btn btn-primary">Add new tag</a>
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
        @forelse($tags as $tag)
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->title}}</td>
                <td>{{$tag->slug}}</td>
                <td><a href="/tag/{{$tag->id}}/edit/" class="btn btn-info">Edit</a><a href="/tag/{{$tag->id}}/destroy/"
                                                                                      class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @empty
            <p>No tags</p>
        @endforelse

        </tbody>
    </table>
    @include('pagination.pagination',['pages'=>$tags,'url'=>'tags'])

@endsection