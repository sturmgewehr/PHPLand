@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('blog.admin.categories.store') }}" method="POST">
            @csrf
            <input type="text" name="title" id="title" required placeholder="title">
            <input type="text" name="slug" id="slug" placeholder="slug">
            <input type="text" name="description" id="description" placeholder="description">
            <select name="parent" id="parent" required>
                @foreach($categoryList as $categoryOption)
                    <option value="{{ $categoryOption->id }}">
                    {{ $categoryOption->id_title }}
                    </option>
                @endforeach
            </select>
            <input type="submit" value="Сохранить">
        </form>
    </div>
@endsection
