{{--<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                ID: {{ $item->id }}
            </div>
        </div>
    </div>
</div>--}}
<div class="row justify-content-center">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="">Создано</label>
                <input class="form-control" type="text" value="{{ $item->created_at }}" disabled>
            </div>
            <div class="form-group">
                <label for="">Обновлено</label>
                <input class="form-control" type="text" value="{{ $item->updated_at }}" disabled>
            </div>
        </div>
    </div>
</div>
