@extends('layouts.app')

@section('content')
    <form action="{{ route('blog.admin.categories.store') }}" method="POST">
        @csrf
        <div class="container">
            @include('blog.admin.categories.includes.display_action_status')

            <div class="row justify-content-center">
                <div class="col-md-7">
                    @include('blog.admin.categories.includes.item_filling_data')
                </div>
                <div class="col-md-4">
                    @include('blog.admin.categories.includes.item_save_data')
                </div>
            </div>
        </div>w
    </form>
@endsection
