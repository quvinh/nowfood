@extends('web.master')

@section('title')
    Edit
@endsection

@section('content')
    <br><br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Sửa món</h3>
            <br>
            <form action="{{ route('update-product', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <select class="form-select" aria-label="Default select example" name="category_id" value="{{ $product->category_id }}" required>
                    <!-- <option selected>Select menu</option> -->
                    @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <div class="form-group">
                  <label for="name">Tên món</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $product->name }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                  </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{ $product->description }}" required>
                </div>
                <div class="form-group">
                    <label for="price">Số lượng</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $product->quantity }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Chọn ảnh</label>
                    <input class="form-control" type="file" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </form>
        </div>
    </div>
@endsection
