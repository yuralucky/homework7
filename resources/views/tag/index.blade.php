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
    @if($tags->currentPage()===1)
        @foreach($tags->getUrlRange($tags->currentPage(), $tags->currentPage()+2) as $num=>$link)
            <a href="/tags/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>
        <a href="/tags/{{$tags->url($tags->lastPage())}}">{{$tags->lastPage()}}</a>
        <a href="/tags/{{$tags->nextPageUrl()}}">Next</a>

    @elseif($tags->currentPage()===$tags->lastPage())
        <a href="/tags/{{$tags->previousPageUrl()}}">Prev</a>
        <a href="/tags/{{$tags->url(1)}}">1</a>
        <span>...</span>
        @foreach($tags->getUrlRange($tags->currentPage()-2,$tags->currentPage()) as $num=>$link)
            <a href="/tags/{{$link}}">{{$num}}</a>
        @endforeach
    @elseif($tags->currentPage()===2)
        <a href="/tags/{{$tags->previousPageUrl()}}">Prev</a>
        @foreach($tags->getUrlRange($tags->currentPage()-1, $tags->currentPage()+1) as $num=>$link)
            <a href="/tags/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>

        <a href="/tags/{{$tags->url($tags->lastPage())}}">{{$tags->lastPage()}}</a>
        <a href="/tags/{{$tags->nextPageUrl()}}">Next</a>
    @elseif($tags->currentPage()===$tags->lastPage()-1)
        <a href="/tags/{{$tags->previousPageUrl()}}">Prev</a>
        <a href="/tags/{{$tags->url(1)}}">1</a>

        <span>...</span>
        @foreach($tags->getUrlRange($tags->currentPage()-1, $tags->currentPage()+1) as $num=>$link)
            <a href="/tags/{{$link}}">{{$num}}</a>
        @endforeach
        <a href="/tags/{{$tags->nextPageUrl()}}">Next</a>
    @else
        <a href="/tags/{{$tags->previousPageUrl()}}">Prev</a>
        <a href="/tags/{{$tags->url(1)}}">1</a>

        <span>...</span>
        @foreach($tags->getUrlRange($tags->currentPage()-1, $tags->currentPage()+1) as $num=>$link)
            <a href="/tags/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>
        {{--    @if($tags->lastPage()!==$tags->currentPage())--}}
        {{--        <a href="/tags/{{$tags->nextPageUrl()}}">Next</a>--}}
        <a href="/tags/{{$tags->url($tags->lastPage())}}">{{$tags->lastPage()}}</a>
        <a href="/tags/{{$tags->nextPageUrl()}}">Next</a>
    @endif
@endsection