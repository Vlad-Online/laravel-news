@extends('index')

@section('title', 'Категории новостей')
@section('content')
    @foreach($newsCategories as $newsCategory)
        <li>
            <a href="{{route('NewsCategory', ['newsCategorySlug'=> $newsCategory->slug])}}">{{$newsCategory->title}}
                ({{$newsCategory->news_count}})</a>
        </li>
    @endforeach
@endsection