@extends('frontend.template.layout')

@section('body-content')

<!-- checkout empty start -->
<section class="empty_cart ">
	<div class="container">
		<img src="{{ asset('frontend/images/empty_cart.png') }}" style="display: block; margin: 0 auto; width: 50%" alt="">
	</div>
</section>
<!-- checkout empty start -->


<!-- checkout main section start -->
<section class="checkout section-padding main_checkout">
	<div class="container">

		<!-- progress row start -->
		<div class="row">
			<div class="col-md-12">
				<div class="progress-bar">
					<div class="step">
						
						<div class="bullet">
							<span>1</span>
							<div class="check">
								<i class="fas fa-check"> </i>
							</div>
						</div>
						<p>review order</p>
					</div>
					<div class="step">
						
						<div class="bullet">
							<span>2</span>
							<div class="check">
								<i class="fas fa-check"> </i>
							</div>
						</div>
						<p>shipping details</p>
					</div>
					<div class="step">
						
						<div class="bullet">
							<span>3</span>
							<div class="check">
								<i class="fas fa-check"> </i>
							</div>
						</div>
						<p>billing address</p>
					</div>
				</div>
			</div>
		</div>
		<!-- progress row end -->

		<!-- form item row start -->
		<div class="row">
			<div class="col-md-12">
				<div class="form-outer">
					<form action="" method="" class="myform">
						@csrf

						<div id="cart_detail">

						</div>
						
						<!-- billing address start -->
						<div class="page slidepage review-order">
							
							<div class="row border">
								<div class="col-md-12">
									<p class="payment-details">payment details</p>
								</div>
								<div class="col-md-12">
									<label class="custom_checkbox">
										cash on delivery
									  	<input type="radio" checked>
									  	<span class="checkmark"></span>
									</label>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<p>review order</p>
								</div>
							</div>

							<!-- review order row start -->
							<div class="row border">
								<div class="col-md-12 table-responsive">

									<table class="table table-striped">
										<tbody id="cart_item_wrapper">
											
										</tbody>
									</table>

								</div>
							</div>
							<!-- review order row end -->

							<!-- total start -->
							<div class="row border text-right">
								<div class="col-md-12">
									<p>delivery charge : 100 taka</p>
								</div>
								<div class="col-md-12">
									<h2>total : <span id="total_price"></span> taka</h2>
								</div>
							</div>
							<!-- total end -->

							<!-- page change start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group text-right">
										<p id="process_cart" class="next-1 next">next step</p>
									</div>
								</div>
							</div>
							<!-- page change end -->
							
							
						</div>
						<!-- billing address end -->

						<!-- shipping details start -->
						<div class="page">

							<div class="row">

								<div class="col-md-12">
									<div class="form-group">
										<label>order notes (optional)</label>
										<textarea class="form-control" name="order_note" rows="15"></textarea>
									</div>
								</div>
							</div>
							
							<!-- page change start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group nextBtn text-right">
										<p class="prev-1 prev">previous step</p>
										<p class="next-2 next">next step</p>
									</div>
								</div>
							</div>
							<!-- page change end -->

						</div>
						<!-- shipping details end -->

						<!-- review order start -->
						<div class="page ">

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Username*</label>
										<input type="text" readonly class="form-control validate" value="{{ Auth::user()->name }}" required="" name="name">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>email address</label>
										<input type="email" value="{{ Auth::user()->email }}" readonly class="form-control validate" required="" name="email">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>phone*</label>
										<input type="text" class="form-control validate" required="" name="phone">
									</div>
								</div>
							</div>

							<!-- address start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group address-form">
										<label>shipping address</label>
										<textarea type="text" class="form-control validate" rows="5" required="" name="" placeholder="street"></textarea>
									</div>
								</div>
							</div>
							<!-- address end -->

							<!-- page change start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group nextBtn text-right">
										<p class="prev-2 prev">previous step</p>
										<input type="submit" class="form-control Submit" value="Place Order"></input>
									</div>
								</div>
							</div>
							<!-- page change end -->
							
						</div>
						<!-- review order end -->

					</form>
				</div>
			</div>
		</div>
		<!-- form item row end -->

	</div>
</section>
<!-- checkout main section end -->

@endsection


@section('cart')
<script src="{{asset('frontend/js/checkout.js')}}"></script>
@endsection