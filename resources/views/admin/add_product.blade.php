<a class="nav-link" href="{{route('main-page')}}">Главная</a>

Добавить Продукты
<form action="{{route('admin_products_new_store')}}" method="POST" enctype="multipart/form-data" style="width: 520px" class="row g-3 needs-validation authorization">
    @csrf
    <div class="col-md-12">
        <label for="name" class="form-label">Имя Продуктa</label>
        <input placeholder="Имя Продуктa" autofocus type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required>
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="category_id" class="form-label">Категории</label>
        <select name="category_id">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-12">
        <label for="price" class="form-label">Цена Продуктa</label>
        <input placeholder="Цена Продуктa" autofocus type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" required>
        @error('price')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="amount" class="form-label">Количество Продуктa</label>
        <input placeholder="Количество Продуктa" autofocus type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" required>
        @error('amount')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="description" class="form-label">Содержание Продуктa</label>
        <input placeholder="Содержание Продуктa" autofocus type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>
        @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-md-12">
        <label for="image" class="form-label">Изображение Продуктa</label>
        <input  autofocus type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
        @error('image')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="col-12" style="display: flex; justify-content: space-between; align-items: flex-end;">
        <button type="submit" class="btn btn-outline-info">Добавить</button>
    </div>
</form>