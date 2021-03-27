
@if($pages->currentPage()===1)
    @foreach($pages->getUrlRange($pages->currentPage(), $pages->currentPage()+2) as $num=>$link)
        <a href="/{{$url}}/{{$link}}">{{$num}}</a>
    @endforeach
    <span>...</span>
    <a href="/{{$url}}/{{$pages->url($pages->lastPage())}}">{{$pages->lastPage()}}</a>
    <a href="/{{$url}}/{{$pages->nextPageUrl()}}">Next</a>

@elseif($pages->currentPage()===$pages->lastPage())
    <a href="/{{$url}}/{{$pages->previousPageUrl()}}">Prev</a>
    <a href="/{{$url}}/{{$pages->url(1)}}">1</a>
    <span>...</span>
    @foreach($pages->getUrlRange($pages->currentPage()-2,$pages->currentPage()) as $num=>$link)
        <a href="/{{$url}}/{{$link}}">{{$num}}</a>
    @endforeach
@elseif($pages->currentPage()===2)
    <a href="/{{$url}}/{{$pages->previousPageUrl()}}">Prev</a>
    @foreach($pages->getUrlRange($pages->currentPage()-1, $pages->currentPage()+1) as $num=>$link)
        <a href="/{{$url}}/{{$link}}">{{$num}}</a>
    @endforeach
    <span>...</span>

    <a href="/{{$url}}/{{$pages->url($pages->lastPage())}}">{{$pages->lastPage()}}</a>
    <a href="/{{$url}}/{{$pages->nextPageUrl()}}">Next</a>
@elseif($pages->currentPage()===$pages->lastPage()-1)
    <a href="/{{$url}}/{{$pages->previousPageUrl()}}">Prev</a>
    <a href="/{{$url}}/{{$pages->url(1)}}">1</a>

    <span>...</span>
    @foreach($pages->getUrlRange($pages->currentPage()-1, $pages->currentPage()+1) as $num=>$link)
        <a href="/{{$url}}/{{$link}}">{{$num}}</a>
    @endforeach
    <a href="/{{$url}}/{{$pages->nextPageUrl()}}">Next</a>
@else
    <a href="/{{$url}}/{{$pages->previousPageUrl()}}">Prev</a>
    <a href="/{{$url}}/{{$pages->url(1)}}">1</a>

    <span>...</span>
    @foreach($pages->getUrlRange($pages->currentPage()-1, $pages->currentPage()+1) as $num=>$link)
        <a href="/{{$url}}/{{$link}}">{{$num}}</a>
    @endforeach
    <span>...</span>
    <a href="/{{$url}}/{{$pages->url($pages->lastPage())}}">{{$pages->lastPage()}}</a>
    <a href="/{{$url}}/{{$pages->nextPageUrl()}}">Next</a>
@endif