@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.admin.includes.display_action_status')
        <form method="POST" action="{{ route('blog.posts.store', $item->id) }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-7">
                    @include('blog.posts.includes.item_filling_data')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.includes.item_save_data')
                </div>
            </div>
        </form>
    </div>
@endsection
