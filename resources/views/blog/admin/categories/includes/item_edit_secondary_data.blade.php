<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li>ID: {{ $item['category']['id'] }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Создано</label>
                <input class="form-control" type="text" value="{{ $item['category']['created_at'] }}" disabled>
            </div>
            <div class="form-group">
                <label for="title">Обновлено</label>
                <input class="form-control" type="text" value="{{ $item['category']['updated_at'] }}" disabled>
            </div>
            <div class="form-group">
                <label for="title">Удалено</label>
                <input class="form-control" type="text" value="{{ $item['category']['deleted_at'] }}" disabled>
            </div>
        </div>
    </div>
</div>
<br>
