{{--@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}

{{-- New variant --}}
@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('blog.includes.display_action_status')
        <div class="dummy">

        </div>
    </div>
@endsection
