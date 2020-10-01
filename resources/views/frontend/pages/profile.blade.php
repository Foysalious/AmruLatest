@extends('frontend.template.layout')

@section('body-content')


<!-- profile page start -->
<section class="profile-page section-padding">
	<div class="container">

		<div class="row">
			<!-- left part start -->
			<div class="col-md-3">
				<div class="visitor-image">
					
				</div>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-9">
				<div class="visitor-info">
					<h2>{{ Auth::user()->name }}</h2>
					<p>{{ Auth::user()->email }}</p>
					<p>{{ Auth::user()->pohone }}</p>
					<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="logout">logout</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</div>
			</div>
			<!-- right part end -->
		</div>

		<!-- middle part start -->
		<div class="row profile-middle">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2 active-order-list">
						<h2>my order list</h2>
						<i class="fas fa-angle-down active-description"></i>
					</div>
				</div>
			</div>
		</div>
		<!-- middle part end -->

		<!-- orderlist row start -->
		<div class="row orderlist">

			<!-- item start -->
			<div class="col-md-12">
				<div class="col-md-12 table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Invoice Id</th>
								<th>Date</th>
								<th>price</th>
								<th>Order Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						@foreach(request()->user()->invoice()->orderBy('id', 'desc')->take(6)->get() as $invoice)
							<tr>
								<th scope="row">#{{$invoice->id}}</th>
								<th scope="row">{{$invoice->created_at->toDayDateTimeString()}}</th>
								<td>{{$invoice->total}} tk</td>
								<td>
									@if($invoice->status == 1)
										<span class="badge badge-warning">Pending</span>
									@elseif($invoice->status == 2)
									<span class="badge badge-primary">Confirmed</span>
									@elseif($invoice->status == 3)
									<span class="badge badge-success">Delivered</span>
									@elseif($invoice->status == 4)
									<span class="badge badge-danger">Cancelled!</span>
									@endif
								</td>
								<td>
									<button class="view-order show-review-popup" id="{{ $invoice->id }}">view detail</button>
									<!-- order review popup start -->
									<div class="order-review-popup {{ $invoice->id }}">
										<div class="container">
											<div class="row">
												<div class="col-md-6 offset-md-3 main-popup-box">
													<i class="fas fa-times hide-popup"></i>
													<div class="order-review-popup-box">
														<table class="table table-striped">
															<thead>
																<tr>
																	<th>Image</th>
																	<th>Product Name</th>
																	<th>Unit price</th>
																	<th>Quantity</th>
																	<th>Total</th>
																</tr>
															</thead>
															<tbody>
																@foreach($invoice->order as $key => $product)
																<tr>
																	<td>
																		<img src="{{ asset('images/product/'.$product->image) }}" width="32px" alt="">
																	</td>
																	<td>
																		{{ $product->product_name }} - {{$product->size}}
																	</td>
																	<td>
																		{{ $product->unit_price }} tk
																	</td>
																	<td>
																		{{ $product->qty }} pcs.
																	</td>
																	<td>
																		{{ $product->total }} tk
																	</td>
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- order review popup end -->
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				
			</div>
			<!-- item end -->



		</div>
		<!-- orderlist row end -->

	</div>
</section>
<!-- profile page end -->

@endsection