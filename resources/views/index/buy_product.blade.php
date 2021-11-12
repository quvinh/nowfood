@extends('index.home')

@section('title')
    Buy product
@endsection

@section('hero_area')
    <!-- hero area -->
    <div class="hero-area hero-bg" style="height: 100px;">
    </div>
    <!-- end hero area -->
@endsection

@section('content')
    <!-- buy -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
                        <h2><span class="orange-text">{{ $product->name }}</span></h2>
                        <div class="single-product-img">
                            <img src="{{ asset('images/'.$product->image) }}" alt="IMAGE">
                        </div>
                        <br>
                        <h4>Description:</h4>
                        <p>{{ $product->description }}</p>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
                        <form action="{{ route('index.buy-product', $product->id) }}" method="post">
                            @csrf
                            <table class="total-table">
                                <thead class="total-table-head">
                                    <tr class="table-total-row">
                                        <th>Bill</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="total-data">
                                        <td><strong>Giá/chiếc: </strong></td>
                                        <td><input id="price" type="text" name="price" value="{{ $product->price }}" readonly> VND</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Số lượng: </strong></td>
                                        <td class="product-quantity"><input id="quantity" type="number" name="quantity" onchange="onChange();" value="0"></td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Tổng: </strong></td>
                                        <td><input type="number" name="sub_total" id="sub_total" readonly> VND</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Shipping: </strong></td>
                                        <td>10 000 VND</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Tổng tất cả: </strong></td>
                                        <td><input type="number" name="total" id="total" readonly> VND</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart-buttons">
                                <!-- <a href="#" class="boxed-btn">Update Cart</a>
                                <a href="#" class="boxed-btn black">Check Out</a> -->
                                <button class="btn btn-primary" type="submit">Mua ngay</button>
                            </div>
                        </form>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end buy -->

    <script>
        function onChange() {
            var price = document.getElementById('price');
            var quantity = document.getElementById('quantity');
            var sub_total = document.getElementById('sub_total');
            var total = document.getElementById('total');
            sub_total.value = parseInt(price.value) * parseInt(quantity.value);
            total.value = parseInt(price.value) * parseInt(quantity.value) + 10000;
        }
    </script>
@endsection
