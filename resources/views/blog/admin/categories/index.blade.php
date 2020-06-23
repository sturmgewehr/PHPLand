@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('blog.admin.includes.display_action_status')
                <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
                    <a class="btn btn-outline-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Категория</th>
                                    <th>Родитель</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paginator as $item)
                                    <tr>
                                        <td>{{ $item['category']['id'] }}</td>
                                        <td>
                                            <a href="{{ route('blog.admin.categories.edit', $item['category']['id']) }}">{{ $item['category']['title'] }}</a>
                                        </td>
                                        <td @if (in_array($item['category']['parent_id'], [0, 1])) style="color: #ccc" @endif>
                                            {{ $item['parent']['title'] ?? 'Корень'  }}
                                        </td>
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
