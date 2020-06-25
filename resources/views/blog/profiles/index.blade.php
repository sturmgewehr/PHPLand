@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-4 col-lg-4 col-sm-12">
                @include('blog.profiles.includes.user_main_info')
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                @include('blog.profiles.includes.user_secondary_info')
            </div>
        </div>
    </div>
@endsection
