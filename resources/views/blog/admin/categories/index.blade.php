@extends('layouts.app')

@section('content')
{{--  Тестовая страница, дизайн в процессе  --}}
    <div class="container">
        <ul>
            <li>id : title : parent</li>
            @foreach($paginator as $item)
                <li>{{ $item->id }} {{ $item->title }} {{  $item->parentTitle }}</li>
            @endforeach
        </ul>
        @if($paginator->total() > $paginator->count())
            <div>{{ $paginator->links() }}</div>
        @endif
    </div>
@endsection
