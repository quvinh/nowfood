@extends('web.master')

@section('title')
Create
@endsection

@section('content')
<br><br>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Thêm bài viết</h3>
        <form action="{{ route('store-news') }}" method="post" id="formCreate">
            @csrf
            <div class="form-group">
                <label for="title">Tiêu đề bài viết</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title"
                    placeholder="Tên">
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <div id="quill">
                    <p>...</p>
                </div>
                <textarea name="content" id="content" hidden></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Tạo mới</button>
        </form>
    </div>
</div>
@endsection
