@extends('layout')

@section('title', 'Add new category')

@section('content')
    @if($tag && !isset($tag))
        <h1>Update category</h1>
    @else
        <h1>Add new category</h1>
    @endif
    <form method="post" action="/tag/create">
        @if($tag)
            <input type="hidden" name="id" value="{{$tag->id}}">
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                   value="{{$tag?$tag->title:''}}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$tag?$tag->slug:''}}">
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection