@extends('index')

@section('title')
    Новость: {{$news->title}}
@endsection

@section('content')
    <h2>Категория: {{$news->newsCategory->title}}</h2>
    <h2>Просмотров: {{$news->views_count}}</h2>
    <h2>Опубликовано: {{$news->created_at}}</h2>
    <div>
        {!! $news->content !!}
    </div>
    @component('popularNews', [
        'popularNews' => $popularNews,
        'newsCategory' => $news->newsCategory
    ])
    @endcomponent
@endsection