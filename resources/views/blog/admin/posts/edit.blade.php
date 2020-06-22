@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.admin.includes.display_action_status')
        <form method="POST" action="{{ route('blog.admin.posts.update', $item['post']['id']) }}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-7">
                    @include('blog.admin.posts.includes.item_filling_data')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.includes.item_save_data')
                    @include('blog.admin.posts.includes.item_edit_secondary_data')
                </div>
            </div>
        </form>
        <br>
        <form method="POST" action="{{ route('blog.admin.posts.destroy', $item['post']['id']) }}">
            @method('DELETE')
            @csrf
            @include('blog.admin.posts.includes.item_delete')
        </form>
    </div>
@endsection
