@extends('./layout')

@section('title', 'List categories')

@section('content')
    <h1>List category</h1>
    <div class="d-grid gap-1">
        <a type="submit" href="/category/create" class="btn btn-primary">Add new category</a>
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
        @forelse($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->title}}</td>
                <td>{{$category->slug}}</td>
                <td><a href="/category/{{$category->id}}/edit/" class="btn btn-info">Edit</a><a
                            href="/category/{{$category->id}}/destroy/" class="btn btn-danger">Delete</a></td>
            </tr>
        @empty
            <p>No $category</p>
        @endforelse

        </tbody>
    </table>
    @if($categories->currentPage()===1)
        @foreach($categories->getUrlRange($categories->currentPage(), $categories->currentPage()+2) as $num=>$link)
            <a href="/categories/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>
        <a href="/categories/{{$categories->url($categories->lastPage())}}">{{$categories->lastPage()}}</a>
        <a href="/categories/{{$categories->nextPageUrl()}}">Next</a>

    @elseif($categories->currentPage()===$categories->lastPage())
        <a href="/categories/{{$categories->previousPageUrl()}}">Prev</a>
        <a href="/categories/{{$categories->url(1)}}">1</a>
        <span>...</span>
        @foreach($categories->getUrlRange($categories->currentPage()-2,$categories->currentPage()) as $num=>$link)
            <a href="/categories/{{$link}}">{{$num}}</a>
        @endforeach
    @elseif($categories->currentPage()===2)
        <a href="/categories/{{$categories->previousPageUrl()}}">Prev</a>
        @foreach($categories->getUrlRange($categories->currentPage()-1, $categories->currentPage()+1) as $num=>$link)
            <a href="/categories/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>

        <a href="/categories/{{$categories->url($categories->lastPage())}}">{{$categories->lastPage()}}</a>
        <a href="/categories/{{$categories->nextPageUrl()}}">Next</a>
    @elseif($categories->currentPage()===$categories->lastPage()-1)
        <a href="/categories/{{$categories->previousPageUrl()}}">Prev</a>
        <a href="/categories/{{$categories->url(1)}}">1</a>

        <span>...</span>
        @foreach($categories->getUrlRange($categories->currentPage()-1, $categories->currentPage()+1) as $num=>$link)
            <a href="/categories/{{$link}}">{{$num}}</a>
        @endforeach
        <a href="/categories/{{$categories->nextPageUrl()}}">Next</a>
    @else
        <a href="/categories/{{$categories->previousPageUrl()}}">Prev</a>
        <a href="/categories/{{$categories->url(1)}}">1</a>

        <span>...</span>
        @foreach($categories->getUrlRange($categories->currentPage()-1, $categories->currentPage()+1) as $num=>$link)
            <a href="/categories/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>
        {{--    @if($categories->lastPage()!==$categories->currentPage())--}}
        {{--        <a href="/categories/{{$categories->nextPageUrl()}}">Next</a>--}}
        <a href="/categories/{{$categories->url($categories->lastPage())}}">{{$categories->lastPage()}}</a>
        <a href="/categories/{{$categories->nextPageUrl()}}">Next</a>
    @endif
@endsection