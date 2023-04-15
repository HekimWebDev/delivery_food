<a class="nav-link" href="{{route('main-page')}}">Главная</a>

Добавить Категории
<form action="{{route('admin_categories_new_store')}}" method="post" style="width: 520px" class="row g-3 needs-validation authorization">
    @csrf

    <div class="col-md-12">
        <label for="name" class="form-label">Имя Категории</label>
        <input placeholder="Имя Категории" autofocus type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="col-md-12">
        <label for="description" class="form-label">Содержание Категории</label>
        <input placeholder="Содержание Категории" autofocus type="text" name="description" id="description" class="form-control" required>
    </div>

    <div class="col-12" style="display: flex; justify-content: space-between; align-items: flex-end;">

        <button type="submit" class="btn btn-outline-info">Добавить</button>
    </div>
</form>