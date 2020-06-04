@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('blog.admin.categories.update', $item->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="container">
                @include('blog.admin.includes.display_action_status')

                <div class="row justify-content-center">
                    <div class="col-md-7">
                        @include('blog.admin.categories.includes.item_filling_data')
                    </div>
                    <div class="col-md-4">
                        @include('blog.admin.includes.item_save_data')
                        @include('blog.admin.categories.includes.item_edit_secondary_data')
                    </div>
                </div>
            </div>
        </form>
        <form action="{{ route('blog.admin.categories.destroy', $item->id) }}" method="POST">
            @method('DELETE')
            @csrf
            @include('blog.admin.categories.includes.item_delete')
        </form>
    </div>
@endsection
