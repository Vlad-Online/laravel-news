<div>
    <h3>Популярные новости категории:</h3>
    @foreach($popularNews as $news)
        <li>
            <a href="{{route('News', [
                'newsCategorySlug'=> $newsCategory->slug,
                'news'=> $news->id,
                'newsSlug' =>$news->slug
                ])}}">{{$news->title}} (просмотров: {{$news->views_count}})</a>
        </li>
    @endforeach
</div>