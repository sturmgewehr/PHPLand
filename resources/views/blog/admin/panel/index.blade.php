@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card text-center">
                    <div class="card-body">
                        <button class="btn btn-light border border-dark btn-block">
                            <a class="simple-link nav-link"
                               href="{{ route('blog.admin.categories.index') }}">Категории</a>
                        </button>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-light border border-dark btn-block">
                            <a class="simple-link nav-link"
                               href="{{ route('blog.admin.posts.index') }}">Статьи</a>
                        </button>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-light border border-dark btn-block">
                            <a class="simple-link nav-link"
                               href="{{ route('blog.admin.users.index') }}">Пользователи</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
