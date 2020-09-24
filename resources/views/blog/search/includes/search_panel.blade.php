<div class="col">
    <form method="GET" action="{{ route('search_route') }}">
        @csrf
        <div class="form-group row py-4">
            <div class="col-md-10">
                <input class="form-control" type="text" name="value" id="value" placeholder="Введите поисковый запрос" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" type="submit">Поиск</button>
            </div>
        </div>
        <div class="form-group row">
{{--            <div>--}}
{{--                <select name="table">--}}
{{--                    <option value="users">Пользователи</option>--}}
{{--                    <option value="blog_posts">Статьи</option>--}}
{{--                    <option value="blog_categories">Категории</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <select name="condition">--}}
{{--                    <option value="name">Пользователи</option>--}}
{{--                    <option value="">Статьи</option>--}}
{{--                    <option value="blog_categories">Категории</option>--}}
{{--                </select>--}}
{{--            </div>--}}

{{--            test--}}
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a name="users" class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Пользователи</a>
                        <a name="blog_posts" class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Статьи</a>
                        <a name="blog_categories" class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Категории</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <select class="form-control" name="condition" size="2">
                                <option value="name">ID</option>
                                <option value="email">Эл.почта</option>
                            </select>
                        </div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                            <select class="form-control" name="condition" size="2">
                                <option value="title">Название</option>
                                <option value="slug">Идентификатор</option>
                            </select>
                        </div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                            <select class="form-control" name="condition" size="2">
                                <option value="title">Название</option>
                                <option value="slug">Идентификатор</option>
                            </select>
                        </div>
                    </div>
            </div>
        </div>
    </form>

</div>
