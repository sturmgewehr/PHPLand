<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <a class="nav-link simple-link" href="">{{ $item->user->name }}</a>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <a class="nav-link simple-link article-bottom-span float-right" href="{{ route('blog.posts.edit', $item->id) }}">Редактировать</a>
                        </div>
                    </div>
                    <h2 class="simple-header">{{ $item->title }}</h2>
                    <a class="nav-link simple-link" href="">{{ $item->category->title }}</a>
                </div>
                <div class="text-justify article-content">
                        {{ $item->content_html }}
                </div>
            </div>
        </div>
    </div>
</div>
