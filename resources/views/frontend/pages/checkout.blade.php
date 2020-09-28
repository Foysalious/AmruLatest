@extends('frontend.template.layout')

@section('body-content')


<!-- checkout main section start -->
<section class="checkout section-padding">
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
										<tbody class="cart">
											<tr>
												<td>Image</td>
												<td>Tea</td>
												<td>100 tk * <input type="number"> <button onclick="return false" class="btn-sm btn-warning">update</button></td>
												<td>1000 tk</td>
												<td>Del</td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>
							<!-- review order row end -->

							<!-- total start -->
							<div class="row border text-right">
								<div class="col-md-12">
									<p>free delivery</p>
								</div>
								<div class="col-md-12">
									<h2>total : 1280 taka</h2>
								</div>
							</div>
							<!-- total end -->

							<!-- page change start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group text-right">
										<p class="next-1 next">next step</p>
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
									<div class="form-check">
									    <input type="checkbox" class="form-check-input" id="exampleCheck1">
									    <label class="form-check-label" for="exampleCheck1">ship to a different address?</label>
									  </div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label>order notes</label>
										<textarea class="form-control" rows="15"></textarea>
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
								<div class="col-md-6">
									<div class="form-group">
										<label>first name*</label>
										<input type="text" class="form-control validate" required="" name="">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>last name*</label>
										<input type="text" class="form-control validate" required="" name="">
									</div>
								</div>
							</div>
							
							<!-- company name start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>company name</label>
										<input type="text" class="form-control validate" required="" name="">
									</div>
								</div>
							</div>
							<!-- company name end -->

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>email address</label>
										<input type="email" class="form-control validate" required="" name="">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>phone*</label>
										<input type="text" class="form-control validate" required="" name="">
									</div>
								</div>
							</div>

							<!-- address start -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group address-form">
										<label>address</label>
										<input type="text" class="form-control validate" required="" name="" placeholder="street">
										<input type="text" class="form-control validate" required="" name="" placeholder="Apartaments, Suite and etc">
									</div>
								</div>
							</div>
							<!-- address end -->

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>post code/zip</label>
										<input type="email" class="form-control validate" required="" name="">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>town/city*</label>
										<input type="text" class="form-control validate" required="" name="">
									</div>
								</div>
							</div>

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