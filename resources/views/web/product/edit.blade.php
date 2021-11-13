@extends('web.master')

@section('title')
    Edit
@endsection

@section('content')
    <form action="{{ route('update-product', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="text" name="category_id" value="{{ $product->category_id }}" required>
        <input type="text" name="name" value="{{ $product->name }}" required>
        <input type="text" name="price" value="{{ $product->price }}" required>
        <input type="text" name="description" value="{{ $product->description }}" required>
        <input type="text" name="quantity" value="{{ $product->quantity }}" required>
        <input type="file" name="image" required>
        <p>{{ $product->image }}</p>
        <button type="submit">Update</button>
    </form>
    <br><br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Thêm món</h3>
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
                <button type="submit" class="btn btn-primary">Tạo mới</button>
              </form>
        </div>
    </div>
@endsection
