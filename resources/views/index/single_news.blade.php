@extends('index.home')

@section('title')
    {{ $news->title }}
@endsection

@section('hero_area')
    <!-- hero area -->
    <div class="hero-area hero-bg" style="height: 100px;">
    </div>
    <!-- end hero area -->
@endsection

@section('content')
    <!-- single article section -->
    <div class="mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-article-section">
                        <div class="single-article-text">
                            <!-- <div class="single-artcile-bg"></div> -->
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> Admin</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ $news->created_at }}</span>
                            </p>
                            <h2>{{ $news->title }}</h2>
                            {!! $news->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single article section -->
@endsection

@section('quilljs')
    <script>
        $(".ql-tooltip" ).hide();
    </script>
@endsection
