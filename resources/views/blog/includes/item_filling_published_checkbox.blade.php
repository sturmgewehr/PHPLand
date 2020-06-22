<div class="form-check">
    <input type="hidden" name="is_published" value="0">

    <input class="form-check-input" type="checkbox" name="is_published" value="1"
           @if ($item['post']['is_published'])
           checked
        @endif>
    <label class="form-check-label" for="is_published">Опубликовано</label>
</div>
