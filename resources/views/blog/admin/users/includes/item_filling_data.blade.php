<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <a class="nav-link simple-link" href="">{{ $item->name }}</a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="user_role">Роль</label>
                    <input class="form-control" type="text" name="user_role" value="{{ $item->userRole }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Эл.почта</label>
                    <input class="form-control" type="text" name="email" value="{{ $item->email }}" disabled>
                </div>
                <div class="form-check">
                    <input type="hidden" name="is_banned" value="0">

                    <input class="form-check-input" type="checkbox" name="is_banned" value="1"
                           @if($item->is_banned) checked @endif
                           @if($item->is_admin === 1  ) disabled @endif>
                    <label class="form-check-label" for="is_banned">Забанить</label>
                </div>
            </div>
        </div>
    </div>
</div>
