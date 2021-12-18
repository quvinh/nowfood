@extends('web.master')

@section('title')
Sửa bài viết
@endsection

@section('content')
<br><br>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">Sửa bài viết</h3>
        <form action="{{ route('update-news', $news->id) }}" method="post" id="formCreate">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="title"
                    value="{{ $news->title }}">
            </div>
            <div class="form-group">
                <label for="content">Nội dung</label>
                <div id="quill">
                    {!! $news->content !!}
                </div>
                <textarea name="content" id="content" hidden></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</div>
@endsection
