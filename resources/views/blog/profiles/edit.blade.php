@extends('layouts.app')

@section('content')
    <div class="container">
        @include('blog.includes.display_action_status')
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Настройки профиля</h3>
                    </div>
                </div>
            </div>
        </div>
{{--Change login and email--}}
        <form method="POST" action="{{ route('profile.update', $item['user']['id']) }}">
            @method('PATCH')
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Логин и эл.почта</h5>
                            <div class="form-group">
                                <input class="form-control" placeholder="Логин" type="text" name="name"
                                       value="{{ old('name', $item['user']['name']) }}">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Эл.почта" type="email" name="email"
                                       value="{{ old('email', $item['user']['email']) }}">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-light border border-dark" type="submit" value="Сохранить">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
{{-- Change password --}}
        <form method="POST" action="{{ route('profile.update_password') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5>Смена пароля</h5>
                            <div class="form-group">
                                <input class="form-control" placeholder="Старый пароль" type="password" name="old">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Новый пароль" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Подтвердите пароль" type="password" name="password_confirmation">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-light border border-dark" type="submit" value="Сохранить">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form method="POST" action="{{ route('profile.destroy', $item['user']['id']) }}">
            @method('DELETE')
            @csrf
{{--            delete button--}}
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-6 col-sm-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <button class="btn btn-light border border-dark" type="submit">
                                Удалить профиль
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
