@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-sm-12">

                @include('blog.includes.display_action_status')

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Логин</th>
                                    <th>Эл.почта</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paginator as $item)
                                    <tr
                                        @if($item['user']['is_admin']) style="background-color: rgba(43,153,95,0.42)" @endif
                                        @if($item['user']['is_banned']) style="background-color: #ccc" @endif
                                    >
                                        <td>{{ $item['user']['id'] }}</td>
                                        <td>
                                            <a href="{{ route('blog.admin.users.edit', $item['user']['id']) }}">{{ $item['user']['name'] }}</a>
                                        </td>
                                        <td>{{ $item['user']['email'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.includes.pagination')
    </div>
@endsection
