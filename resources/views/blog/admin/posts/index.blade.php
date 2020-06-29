@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">

                @include('blog.includes.display_action_status')

                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Автор</th>
                                <th>Категория</th>
                                <th>Заголовок</th>
                                <th>Дата публикации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($paginator as $item)
                                <tr @if (!$item['post']['is_published']) style="background-color: #ccc" @endif>
                                    <td>{{ $item['post']['id'] }}</td>
                                    <td>{{ $item['user']['name'] }}</td>
                                    <td>{{ $item['category']['title'] }}</td>
                                    <td>
                                        <a href="{{ route('blog.admin.posts.edit', $item['post']['id']) }}">{{ $item['post']['title'] }}</a>
                                    </td>
                                    <td>{{ $item['post']['published_at'] ? Carbon\Carbon::parse($item['post']['published_at'])->format('d.m.Y H:i') : '' }}</td>
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
