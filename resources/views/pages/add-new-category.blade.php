@extends('layout')

@section('title', 'Add new category')

@section('content')
    @if($category)
        <h1>Update category</h1>
    @else
        <h1>Add new category</h1>
    @endif
    <form method="post" action="../../../list-categories.php">
        @if($category)
            <input type="hidden" name="id" value="{{$category->id}}">
        @endif
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title"
                   value="{{$category?$category->title:''}}">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{$category?$category->slug:''}}">
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection