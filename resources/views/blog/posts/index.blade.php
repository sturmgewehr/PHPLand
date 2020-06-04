@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row row-flex">
            @foreach($paginator as $item)
                <div class="col-md-3 col-lg-3 col-sm-12 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <img class="img-fluid" src="{{ asset('/images/1072133.png') }}">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->title }}</h4>
                            <p class="card-text">{{ $item->excerpt }}</p>
                        </div>
                        <div class="card-footer">
                            <a class="card-link" href="{{ route('blog.posts.show', $item->id) }}">Подробнее</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
