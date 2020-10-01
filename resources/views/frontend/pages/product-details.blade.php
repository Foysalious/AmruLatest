@extends('frontend.template.layout')

@section('body-content')

<!-- product details section start -->
<section class="product-details section-padding">
	<div class="container">
		
		<!-- top part start -->
		<div class="row">
			<!-- left part start -->
			<div class="col-md-4">
				<div class="product-main-img">
					<img src="{{asset('images/product/'.$product->images[0]->image)}}" class="img-fluid to-img1 block__pic">
					<img src="{{asset('images/product/'.$product->images[1]->image)}}" class="img-fluid to-img2 block__pic">
					<img src="{{asset('images/product/'.$product->images[2]->image)}}" class="img-fluid to-img3 block__pic">
				</div>

				<!-- bottom image select start -->
				<div class="row product-bottom-img-row">
					<div class="col-md-4 col-4">
						<img src="{{asset('images/product/'.$product->images[0]->image)}}" class="img-fluid for-img1">
						<i class="fas fa-caret-up caret-one"></i>
					</div>
					<div class="col-md-4 col-4">
						<img src="{{asset('images/product/'.$product->images[1]->image)}}" class="img-fluid for-img2" >
						<i class="fas fa-caret-up caret-two"></i>
					</div>
					<div class="col-md-4 col-4">
						<img src="{{asset('images/product/'.$product->images[2]->image)}}" class="img-fluid for-img3">
						<i class="fas fa-caret-up caret-three"></i>
					</div>
				</div>
				<!-- bottom image select end -->

			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-8">
				<div class="product-details-right">
					<p>{{$product->category->name}}</p>

					<!-- title and price row start -->
					<div class="row">
						<div class="col-md-6 col-6">
							<h2>{{$product->name}}</h2>
						</div>
						<div class="col-md-6 col-6 product-details-right-price">
							@if($product->offer_price==NULL)
							<h2>{{$product->regular_price}}TK </h2>
							@else
							<h2>{{$product->offer_price}}TK </h2>
							<h2> <del> {{$product->regular_price}}TK </del></h2>
							@endif
						</div>
					</div>
					<!-- title and price row end -->

					<!-- review row start -->
					<div class="row">
						<div class="col-md-3 col-4 product-detail-rating">
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
						<div class="col-md-9 col-8 product-detail-review">
							<p>4.7 <i class="fas fa-caret-right"></i></p>
						</div>
					</div>
					<!-- review row end -->

					<!-- description row start -->
					<div class="row description-row">
						<div class="col-md-12">
							<p>{{$product->description}}
							</p>
							
						</div>
					</div>
					<!-- description row end -->

					<!-- add to cart and wishlist row start -->
					<div class="row product-detail-cart">
						<div class="col-md-12 product-detail-cart">
							<ul>
								<li>
									@if( $product->quantity > 0 )
									<button data-id="{{ $product->id }}" data-image="{{ $product->images[0]->image }}" data-name="{{ $product->name }}" 
										@if( $product->offer_price == NULL )
										data-price="{{ $product->regular_price }}"
										@else
										data-price="{{ $product->offer_price }}"
										@endif 
										class="addToCart">
											<img src="{{ asset('frontend/images/cart-bag.png') }}"> add to bag
									</button>
								@else
								<button class="addToCart disabled">
									out of stock
								</button>
								@endif
								</li>
							</ul>
							
						</div>
					</div>
					<!-- add to cart and wishlist row end -->

				</div>
			</div>
			<!-- right part end -->
		</div>
		<!-- top part end -->

		<!-- latest product title row start -->
		<div class="row latest-product-title">
			<div class="col-md-12">
				<h2>Related <span>product</span> </h2>
			</div>
		</div>
		<!-- latest product title row end -->

		<!-- latest product row start -->
		<div class="row">
			<!-- slider start -->
			<div class="latest-product-carousel latest-product-carousel-shop owl-carousel owl-theme">

				<!-- product item start -->
				@foreach ($relatedProducts as $product)
				<div class="item">
					<div class="col-md-12 col-12 product-hover">
						<div class="product-item-01">
							<div class="product-hover-item">
								
								
								<a class="show-product-popup" id="profile_view_1">
									<i class="fas fa-eye"></i>
								</a>
							</div>
	
							<!-- main thumbnail -->
							<a href="{{route('productDetails',$product->slug)}}"><img src="{{asset('images/product/'.$product->images[0]->image)}}" class="img-fluid"></a>
							
							<!-- main thumbnail -->
	
							<!-- go product details -->
							<a href="">
								<p>{{$product->name}}</p>
								@if($product->offer_price==NULL)
								<span>{{$product->regular_price}} </span>
								@else
								<span>{{$product->offer_price}} </span>
								<span> <del> {{$product->regular_price}} </del></span>
								@endif
							</a>
							<!-- go product details -->
							
							<div class="product-item-cart">
								@if( $product->quantity > 0 )
									<button data-id="{{ $product->id }}" data-image="{{ $product->images[0]->image }}" data-name="{{ $product->name }}" 
										@if( $product->offer_price == NULL )
										data-price="{{ $product->regular_price }}"
										@else
										data-price="{{ $product->offer_price }}"
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
				</div>
								
				@endforeach
				<!-- product item end -->

				
    		</div>
			<!-- slider end -->
			
			@foreach ($relatedProducts as $product)
			<!-- product quick view popup start -->
			<div class="product-quick-view profile_view_1">
				<i class="fas fa-times hide-quick-view"></i>
				<div class="container">
					<div class="row">
						<div class="col-md-12 product-quick-view-main-box" >
							
							<div class="row">
								<!-- left part start -->
								<div class="col-md-6">
									<div class="product-main-img">
										<a href="product-details.php">
											<img src="{{ asset('images/product/'.$product->images[0]->image) }}" class="img-fluid to-img1 ">
										</a>
									</div>
								</div>
								<!-- left part end -->

								<!-- right part start -->
								<div class="col-md-6">
									<div class="product-quick-view-right">
										<h2 class="quick-view-heading">{{ $product->name }}</h2>

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
												<h2 class="quick-view-heading">	@if($product->offer_price==NULL)
													<span>{{$product->regular_price}}TK </span>
													@else
													<span>{{$product->offer_price}}TK </span>
													<span> <del> {{$product->regular_price}}TK </del></span>
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
													{{  $product->description }}
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
			<!-- product quick view popup  end -->
			@endforeach

		</div>
		<!-- latest product row end -->

	</div>
</section>
<!-- product details section end -->


@endsection


@section('cart')
<script src="{{asset('frontend/js/cart.js')}}"></script>
@endsection