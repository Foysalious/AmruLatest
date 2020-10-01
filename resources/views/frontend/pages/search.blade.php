@extends('frontend.template.layout')

@section('body-content')


<!-- shop page main section start -->
<section class="shop section-padding">
	<div class="container">

		<!-- top row start -->
		<div class="row">

			<!-- right part start -->
			<div class="col-md-12">
				<div class="shop-right">

					<!-- shop right top start -->
					<div class="shop-right-top">
						<div class="row">

							<!-- left part start -->
							<div class="col-md-12 shop-right-top-left">
								{{-- <ul>
									<li>sort by : </li>
									<li class="click-sort sort-2" id="sort-2">price</li>
									<li class="click-sort sort-3" id="sort-3">rating</li>
									<li class="click-sort sort-4" id="sort-4">popularity</li>
									<li class="click-sort sort-5" id="sort-5">newest</li>
								</ul> --}}
							</div>
							<!-- left part end -->

						</div>
					</div>
					<!-- shop right top end -->

					<!-- shop product start -->
					<div class="shop-product">

						<!-- grid wise -->
						<div class="row col-wise">

							<!-- product item start -->
							@foreach( $search as $searc  )
							<div class="col-md-3 col-6 product-hover">
								<div class="product-item-01">
									<div class="product-hover-item">
										<a class="show-product-popup" id="{{$searc->id}}">
	                                    	<i class="fas fa-eye"></i>
	                                  	</a>
									</div>

									<!-- main thumbnail -->
									<a href="{{ route('productDetails', $searc->slug) }}">
										<img src="{{asset('images/product/'.$searc->images[0]->image )}}" class="img-fluid">
									</a>
									<!-- main thumbnail -->

									<!-- go product details -->
									<p>{{ $searc->name }}</p>
									@if($searc->offer_price==NULL)
									<span>{{$searc->regular_price}} </span>
									@else
									<span>{{$searc->offer_price}} </span>
									<span> <del> {{$searc->regular_price}} </del></span>
									@endif
									<!-- go product details -->

									<div class="product-item-cart">
										@if( $searc->quantity > 0 )
									<button data-id="{{ $searc->id }}" data-image="{{ $searc->images[0]->image }}" data-name="{{ $searc->name }}" 
										@if( $searc->offer_price == NULL )
										data-price="{{ $searc->regular_price }}"
										@else
										data-price="{{ $searc->offer_price }}"
										@endif 
										class="addToCart">
											<img src="{{ asset('frontend/images/cart-bag.png') }}"> add to bag
									</button>
								@else
								<button class="addToCart disabled">
									out of stock
								</button>
								@endif
									</div>
									<ul>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									</ul>
								</div>
							</div>
							<!-- product item end -->

							<!-- product quick view popup start -->
							<div class="product-quick-view {{$searc->id}}">
								<i class="fas fa-times hide-quick-view"></i>
								<div class="container">
									<div class="row">
										<div class="col-md-12 product-quick-view-main-box" >

											<div class="row">
												<!-- left part start -->
												<div class="col-md-6">
													<div class="product-main-img">
															<img src="{{asset('images/product/'.$searc->images[0]->image) }}" class="img-fluid to-img1 ">
													</div>
												</div>
												<!-- left part end -->

												<!-- right part start -->
												<div class="col-md-6">
													<div class="product-quick-view-right">
													<h2 class="quick-view-heading">{{ $searc->name }}</h2>

														<!-- review start -->
														<div class="row">
															<div class="col-md-6 col-6 product-quick-view-right-left">
																<ul>
																	<li>
																		<a href=""><i class="fas fa-star"></i></a>
																	</li>
																	<li>
																		<a href=""><i class="fas fa-star"></i></a>
																	</li>
																	<li>
																		<a href=""><i class="fas fa-star"></i></a>
																	</li>
																	<li>
																		<a href=""><i class="fas fa-star"></i></a>
																	</li>
																	<li>
																		<a href=""><i class="fas fa-star"></i></a>
																	</li>
																</ul>
															</div>
															<div class="col-md-6 col-6">
																<p>122 reviews</p>
															</div>
														</div>
														<!-- review end -->

														<!-- avaiablity and stock start -->
														<div class="row available">
															<div class="col-md-6 col-6">
																<h2>availablity : </h2>
															</div>
															<div class="col-md-6 col-6">
																<h2>in stock</h2>
															</div>
														</div>
														<!-- avaiablity and stock end -->

														<!-- price row start -->
														<div class="row">
															<div class="col-md-12">
																<h2 class="quick-view-heading">	@if($searc->offer_price==NULL)
																	<span>{{$searc->regular_price}}TK </span>
																	@else
																	<span>{{$searc->offer_price}}TK </span>
																	<span> <del> {{$searc->regular_price}}TK </del></span>
																	@endif
																</h2>
															</div>
														</div>
														<!-- price row end -->

														<!-- description row start -->
														<div class="row">
															<div class="col-md-12">
																<h2 >description</h2>
															</div>
															<div class="col-md-12">
																<p>
																	{{ $searc->description }}
																</p>
															</div>
														</div>
														<!-- description row end -->

													</div>
												</div>
												<!-- right part end -->

											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!-- product quick view popup  end -->



						</div>
						<!-- grid wise -->

					</div>
					<!-- shop product end -->

				</div>

				 <!-- shop page pagination start -->
				<div class="shop-pagination">
					<div class="row">
						<div class="col-md-12">
							<ul>
								{{ $search->links() }}
							</ul>
						</div>
					</div>
				</div>
				<!-- shop page pagination end --> 

			</div>
			<!-- right part end -->
		</div>
		<!-- top row end -->

	</div>
</section>
<!-- shop page main section end -->


@endsection 