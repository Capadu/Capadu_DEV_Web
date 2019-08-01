@foreach($page_master->pages as $page)

    <a href="{{$page_master->route}}/{{$page->route}}">{{$page->title}}</a>

@endforeach