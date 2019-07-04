@extends('index')

@section('title')
    Категория: {{$newsCategory->title}}
@endsection

@section('content')

    <h2>Всего новостей: {{$newsCategory->news_count}}</h2>
    <table>
        <tr>
            <td>Заголовок</td>
            <td>Дата публикации</td>
            <td>Картинка</td>
            <td>Анонс</td>
        </tr>
        @foreach($categoryNews as $news)
            @php
                $date = \Carbon\Carbon::parse($news->created_at);
            @endphp
            <tr>
                <td><a href="{{route('News', [
                'newsCategorySlug'=> $newsCategory->slug,
                'news'=> $news->id,
                'newsSlug' =>$news->slug
                ])}}">{{$news->title}}</a></td>
                <td>{{$date->format('d.m.Y H:i')}}</td>
                <td><img width="200" src="{{ \Illuminate\Support\Facades\Storage::url($news->image)}}"></td>
                <td>{{ strip_tags($news->preview) }}</td>
            </tr>
        @endforeach
    </table>
    {{$categoryNews->links()}}
    @component('popularNews', [
        'popularNews' => $popularNews,
        'newsCategory' => $newsCategory
      ])
    @endcomponent
@endsection