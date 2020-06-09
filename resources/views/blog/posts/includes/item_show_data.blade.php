<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <span>{{ $item->user->name }}</span>
                    <h2>{{ $item->title }}</h2>
                    <span>{{ $item->category->title }}</span>
                </div>
                <div class="text-justify article-content">
                        {{ $item->content_html }}
                </div>
            </div>
        </div>
    </div>
</div>
