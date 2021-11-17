@extends('web.master')

@section('title')
    Edit
@endsection

@section('content')
    <br><br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Sửa danh mục</h3>
            <form action="{{ route('update-category', $category->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="name">Tên danh mục</label>
                  <input type="text" class="form-control" id="name" name="name" aria-describedby="name" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </form>
        </div>
    </div>
@endsection
