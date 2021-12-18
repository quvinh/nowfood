@extends('index.home')

@section('title')
    Bài viết
@endsection

@section('hero_area')
    <!-- hero area -->
    <div class="hero-area hero-bg" style="height: 100px;">
    </div>
    <!-- end hero area -->
@endsection

@section('content')
    <!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">
                @foreach($news as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <!-- <a href="#"><div class="latest-news-bg news-bg-1"></div></a> -->
                            <div class="news-text-box">
                                <h3><a href="#">{{ $item->title }}</a></h3>
                                <p class="blog-meta">
                                    <span class="author"><i class="fas fa-user"></i> Admin</span>
                                    <span class="date"><i class="fas fa-calendar"></i> {{ $item->created_at }}</span>
                                </p>
                                <!-- <p class="excerpt">Content</p> -->
                                <a href="{{ route('index.single-news', $item->id) }}" class="read-more-btn">Xem thêm <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
@endsection
