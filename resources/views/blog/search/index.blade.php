@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.search.includes.search_panel')
        @if($paginator)
            <div class="row justify-content-center">
                @foreach($paginator as $item)
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset('images/User.png') }}" alt="img">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['post']['title'] }}</h5>
                                <p class="card-text">{{ $item['post']['excerpt'] }}</p>
                                <a class="card-link" href="{{ route('blog.posts.show', $item['post']['id']) }}">Посмотреть
                                    статью</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @include('partials.includes.pagination')
        @else
            <div class="row justify-content-center py-5">
                <h3>По запросу "{{ $value }}" ничего не найдено</h3>
            </div>
        @endif
    </div>
@endsection
