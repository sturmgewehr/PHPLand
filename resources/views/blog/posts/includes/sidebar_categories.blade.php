<div class="col-sm-12 col-md-12 col-lg-12 sidebar">
    <div class="list-group">
        <span class="list-group-item custom-bg-dark">
            Категории
        </span>
        @foreach($categoryList as $item)
            <a href="#" class="list-group-item">
                {{ $item->id_title }}
            </a>
        @endforeach
    </div>
</div>
