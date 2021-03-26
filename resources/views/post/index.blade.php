@extends('./layout')

@section('title', 'List posts')

@section('content')
    <h1>List posts</h1>
    <div class="d-grid gap-1">
        <a type="submit" href="/post/create" class="btn btn-primary">Add new post</a>
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
        @forelse($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td><a href="/post/{{$post->id}}/edit/" class="btn btn-info">Edit</a><a
                            href="/post/{{$post->id}}/destroy/" class="btn btn-danger">Delete</a></td>
            </tr>
        @empty
            <p>No posts</p>
        @endforelse

        </tbody>
    </table>
    @if($posts->currentPage()===1)
        @foreach($posts->getUrlRange($posts->currentPage(), $posts->currentPage()+2) as $num=>$link)
            <a href="/posts/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>
        <a href="/posts/{{$posts->url($posts->lastPage())}}">{{$posts->lastPage()}}</a>
        <a href="/posts/{{$posts->nextPageUrl()}}">Next</a>

    @elseif($posts->currentPage()===$posts->lastPage())
        <a href="/posts/{{$posts->previousPageUrl()}}">Prev</a>
        <a href="/posts/{{$posts->url(1)}}">1</a>
        <span>...</span>
        @foreach($posts->getUrlRange($posts->currentPage()-2,$posts->currentPage()) as $num=>$link)
            <a href="/posts/{{$link}}">{{$num}}</a>
        @endforeach
    @elseif($posts->currentPage()===2)
        <a href="/posts/{{$posts->previousPageUrl()}}">Prev</a>
        @foreach($posts->getUrlRange($posts->currentPage()-1, $posts->currentPage()+1) as $num=>$link)
            <a href="/posts/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>

        <a href="/posts/{{$posts->url($posts->lastPage())}}">{{$posts->lastPage()}}</a>
        <a href="/posts/{{$posts->nextPageUrl()}}">Next</a>
    @elseif($posts->currentPage()===$posts->lastPage()-1)
        <a href="/posts/{{$posts->previousPageUrl()}}">Prev</a>
        <a href="/posts/{{$posts->url(1)}}">1</a>

        <span>...</span>
        @foreach($posts->getUrlRange($posts->currentPage()-1, $posts->currentPage()+1) as $num=>$link)
            <a href="/posts/{{$link}}">{{$num}}</a>
        @endforeach
        <a href="/posts/{{$posts->nextPageUrl()}}">Next</a>
    @else
        <a href="/posts/{{$posts->previousPageUrl()}}">Prev</a>
        <a href="/posts/{{$posts->url(1)}}">1</a>

        <span>...</span>
        @foreach($posts->getUrlRange($posts->currentPage()-1, $posts->currentPage()+1) as $num=>$link)
            <a href="/posts/{{$link}}">{{$num}}</a>
        @endforeach
        <span>...</span>
        {{--    @if($posts->lastPage()!==$posts->currentPage())--}}
        {{--        <a href="/posts/{{$posts->nextPageUrl()}}">Next</a>--}}
        <a href="/posts/{{$posts->url($posts->lastPage())}}">{{$posts->lastPage()}}</a>
        <a href="/posts/{{$posts->nextPageUrl()}}">Next</a>
    @endif
@endsection