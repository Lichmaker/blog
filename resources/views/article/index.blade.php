@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ config('blog.article.title') }}</h3>
        <h5>{{ config('blog.article.subTitle') }}</h5>

        <h6>{{ config('blog.article.description') }}</h6>
    @endcomponent

    @include('widgets.article')

    {{ $articles->links('pagination.default') }}

@endsection