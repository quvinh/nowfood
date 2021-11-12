@extends('index.home')

@section('title')
    Cart
@endsection

@section('hero_area')
    <!-- hero area -->
    <div class="hero-area hero-bg" style="height: 100px;">
    </div>
    <!-- end hero area -->
@endsection

@section('content')
	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
                                    <th></th>
								</tr>
							</thead>
							<tbody>
                                @foreach($info as $item)
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
                                        <td class="product-image"><img src="{{ asset('images/'.$item->image) }}" alt=""></td>
                                        <td class="product-name">{{ $item->name }}</td>
                                        <td class="product-price">{{ $item->price }} VND</td>
                                        <td class="product-quantity"><input type="number" value="{{ $item->quantity }}"></td>
                                        <td class="product-total">{{ $item->total }} VND</td>
                                        <td>
                                            <form action="{{ route('index.buy-cart', $item->product_id) }}" method="post">
                                                @csrf
                                                <input type="text" name="product_id" value="{{ $item->id }}" hidden>
                                                <input type="text" name="total" value="{{ $item->total }}" hidden>
                                                <button type="submit" class="btn btn-secondary">Mua {{ $item->name }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>{{ $sub_price }} VND</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>10 000 VND</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{ $all_price }} VND</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="#" class="boxed-btn">Update Cart</a>
							<a href="#" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

@endsection
