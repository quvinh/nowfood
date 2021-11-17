@extends('web.master')

@section('title')
    Create
@endsection

@section('content')
    <br><br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Thêm danh mục</h3>
            <form action="{{ route('store-category') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Tên danh mục</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Tên">
                </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Tạo mới</button>
              </form>
        </div>
    </div>
@endsection
