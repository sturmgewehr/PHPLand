<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <a class="nav-link simple-link" href="">{{ $item->user->name }}</a>
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
