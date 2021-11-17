@extends('web.master')

@section('title')
    Create
@endsection

@section('content')
    <br><br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Thêm món</h3>
            <form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
                @csrf
                <select class="form-select" aria-label="Default select example" name="category_id" required>
                    <option selected value="">Select menu</option>
                    @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                  <label for="name">Tên món</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Tên món" required>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Giá" required>
                  </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Số lượng" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Chọn ảnh</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
              </form>
        </div>
    </div>
@endsection
