<div class="col py-4">
    <h3 class="text-center">Поиск статей</h3>
    <form method="GET" action="{{ route('search_route') }}">
        @csrf
        <div class="form-group row">
            <div class="col-md-10">
                <input class="form-control" type="text" name="value" id="value" value="{{ old('value') }}" placeholder="Введите поисковый запрос"
                       required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-block" type="submit">Поиск</button>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="condition" value="title" id="condition_title" checked>
                    <label class="form-check-label" for="condition_title">Заголовок</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="condition" value="slug" id="condition_slug">
                    <label class="form-check-label" for="condition_slug">Идентификатор</label>
                </div>
            </div>
        </div>
    </form>
</div>
