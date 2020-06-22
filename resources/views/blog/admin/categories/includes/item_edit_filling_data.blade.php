<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#maindata" role="tab">Основные данные</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input class="form-control" type="text" name="title" id="title"
                                   value="{{ old('title', $item['category']['title']) }}" minlength="3" required>
                        </div>

                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input class="form-control" type="text" name="slug" id="slug"
                                   value="{{ old('slug', $item['category']['slug']) }}">
                        </div>

                        <div class="form-group">
                            <label for="parent_id">Родитель</label>
                            <select class="form-control" name="parent_id" id="parent_id"
                                    placeholder="Выберите категорию" requireds>
                                @foreach ($categoryList as $categoryOption)
                                    @if($categoryOption->id != $item['category']['id'])
                                        <option value="{{ $categoryOption->id }}"
                                                @if ($categoryOption->id == $item['category']['parent_id']) selected @endif>
                                            {{ $categoryOption->id_title }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" name="description" id="description"
                                      rows="3">{{ old('description', $item['category']['description']) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
