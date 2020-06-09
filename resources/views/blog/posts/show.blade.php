@extends('layouts.app')

@section('content')
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    @include('blog.posts.includes.item_show_data')
                </div>
                <div class="col-md-4 col-lg-4">
                    @include('blog.posts.includes.sidebar_categories')
                </div>
            </div>
        </div>
    </div>
@endsection
