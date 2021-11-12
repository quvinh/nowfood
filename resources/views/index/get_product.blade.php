@extends('index.home')

@section('title')
    Product
@endsection

@section('hero_area')
    <!-- hero area -->
    <div class="hero-area hero-bg" style="height: 100px;">
    </div>
    <!-- end hero area -->
@endsection

@section('content')
    <!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{ asset('images/'.$product->image) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><span class="orange-text">{{ $product->name }}</span></h3>
						<p class="single-product-pricing"><span>Per</span> {{ $product->price }} vnd</p>
						<p>{{ $product->description }}</p>
						<div class="single-product-form">
							<form action="">
                                <label for="">Kho</label>
								<input type="number" placeholder="{{ $product->quantity }}" readonly>
							</form>
                            <a type="button" class="cart-btn" href="{{ route('index.buy', $product->id )}}">Mua ngay</a>
							<!-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
							<p><strong>Loại: </strong>{{ $product->category->name }}</p>
						</div>
						<h4>Share:</h4>
						<ul class="product-share">
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

    <!-- comment -->
    <br>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Bình luận</h3>
            <br>
            @foreach($comment as $item)
                <h5><span class="orange-text">{{ $item->name }}</span></h5>
                <p>Comment: {{ $item->comment }}</p>
                <hr>
            @endforeach
            <br>
            <form action="{{ route('index.store-comment') }}" method="post">
                @csrf
                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                <input type="text" name="star" value="0" hidden>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="comment" placeholder="Your comment" aria-label="Your comment" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <br><br>

    <!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end more products -->

@endsection
