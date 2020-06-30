<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="">
                <img class="card-img " src="{{ asset('images/1072133.png') }}" >
            </div>
            <div class="card-body">
                <h2>{{ $user['user']['name'] }}</h2>
                <p class="text-secondary">{{ $user['user']['email'] }}</p>
                @if(\Illuminate\Support\Facades\Auth::id() === $user['user']['id'])
                    <button class="btn btn-block btn-light border border-dark">
                        <a class="simple-link nav-link" href="{{ route('profile.edit', $user['user']['id']) }}">Редактировать профиль</a>
                    </button>
                @endif
                @if(\Illuminate\Support\Facades\Auth::id() === $user['user']['id'] && $user['user']['is_admin'] === 1)
                    <button class="btn btn-block btn-light border border-dark">
                        <a class="simple-link nav-link" href="{{ route('profile.admin_panel') }}">Админ панель</a>
                    </button>
                @endif
            </div>
        </div>
    </div>
</div>
