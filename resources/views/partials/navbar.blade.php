<nav class="navbar navbar-expand-md navbar-dark custom-bg-dark custom-shadow">
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
                <a class="nav-link" href="">Статьи</a>
                {{-- Временная ссылка, в будущем будет только при доступе АДМИН --}}
                <a class="nav-link" href="{{ route('blog.admin.categories.index') }}">Категории</a>
            </ul>

            <!-- Right Side Of Navbar -->
            @include('partials.includes.navbar_auth_module')
    </div>
</nav>