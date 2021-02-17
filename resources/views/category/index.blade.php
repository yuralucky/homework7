@extends('./layout')

@section('title', 'List categories')

@section('content')
    <h1>List categories</h1>
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
        @forelse($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td><a href="/category/{{$category->id}}/edit/" class="btn btn-info">Edit</a><a href="/category/{{$category->id}}/destroy/" class="btn btn-danger">Delete</a></td>
            </tr>
        @empty
            <p>No categories</p>
        @endforelse

        </tbody>
    </table>
    <div class="d-grid gap-1">
        <a type="submit" href="/category/create" class="btn btn-primary">Add new category</a>
    </div>
@endsection