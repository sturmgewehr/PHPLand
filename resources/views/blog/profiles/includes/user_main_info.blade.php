<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="">
                <img class="card-img " src="{{ asset('images/1072133.png') }}" >
            </div>
            <div class="card-body">
                <h2>{{ $user['user']['name'] }}</h2>
                <p class="text-secondary">{{ $user['user']['email'] }}</p>
                <button class="btn btn-block btn-light border border-dark">
                    <a class="simple-link nav-link" href="{{ route('profile.edit', $user['user']['id']) }}">Редактировать профиль</a>
                </button>
            </div>
        </div>
    </div>
</div>
