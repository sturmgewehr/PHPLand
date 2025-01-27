<nav class="navbar navbar-expand-lg navbar-dark custom-bg-dark custom-shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="{{ route('blog.posts.index') }}">Статьи</a>
                <a class="nav-link" href="{{ route('blog.posts.create') }}">Написать статью</a>
                <a class="nav-link" href="{{ route('search_route') }}">Поиск</a>

            </ul>

            <!-- Right Side Of Navbar -->
            @include('partials.includes.navbar_auth_module')
    </div>
</nav>
