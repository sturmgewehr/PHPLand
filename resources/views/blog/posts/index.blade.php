@extends('layouts.app')

@section('content')
    <div class="blog">
        <div class="container">
            @include('blog.includes.display_action_status')
            <div class="row row-flex">
                <div class="col-md-8 col-lg-8">
                    @foreach($paginator as $item)
                        <div class="article-border">
                            <h4 class="card-title">
                                <a class="card-link" href="{{ route('blog.posts.show', $item['post']['id']) }}">{{ $item['post']['title'] }}</a>
                            </h4>
                            <div class="article-preview-body">
                                <p class="card-text">{{ $item['post']['excerpt'] }}</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-3"><span class="article-bottom-span">Автор:{{ $item['user']['name'] }}</span></div>
                                <div class="col-lg-4"><span class="article-bottom-span">Категория:{{ $item['category']['title'] }}</span></div>
                                <div class="col-lg-5"><span class="article-bottom-span">Опубликовано:{{ $item['post']['published_at'] }}</span></div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 col-lg-4">
                    @include('blog.posts.includes.sidebar_categories')
                </div>
            </div>
            @include('partials.includes.pagination')
        </div>
    </div>
@endsection
