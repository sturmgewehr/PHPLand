@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.admin.includes.display_action_status')
        <form action="{{ route('blog.admin.users.update', $item['user']['id']) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-7 col-sm-12">
                    @include('blog.admin.users.includes.item_filling_data')
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    @include('blog.admin.includes.item_save_data')
                    @include('blog.admin.users.includes.item_edit_secondary_data')
                </div>
            </div>
        </form>
        @if($item['user']['is_admin'] !== 1)
            <form action="{{ route('blog.admin.users.destroy', $item['user']['id']) }}" method="POST">
                @method('DELETE')
                @csrf
                @include('blog.admin.posts.includes.item_delete')
            </form>
        @endif
    </div>
@endsection
