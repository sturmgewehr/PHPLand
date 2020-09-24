<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body text-center">
                <button class="btn btn-light border border-dark">
                    <a class="nav-link simple-link"
                       href="{{ route('search_route', ['user_id', $user['user']['id']]) }}">Написанные статьи</a>
                </button>
            </div>
        </div>
    </div>
</div>
