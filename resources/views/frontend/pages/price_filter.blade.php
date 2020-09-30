@extends('frontend.template.layout')

@section('body-content')

<!-- page indicator section start -->
<section class="page-indicator">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li><a href="{{ route('subcat',$subcat->parent->slug) }}">{{ $subcat->parent->name }}</a></li>
					<li><i class="fas fa-angle-right"></i></li> 
					<li><a href="">{{ $subcat->name }}</a></li>
				</ul>
			</div>
		</div>
	</div>
</section>
<!-- page indicator section end -->



<!-- shop page main section start -->
<section class="shop section-padding">
	<div class="container">

		<!-- top row start -->
		<div class="row">
			<!-- left part start -->
			<div class="col-md-3">


				<!-- filter for mob start -->
				<div class="row filter-for-mob">
					<div class="col-6">
						<h2>filter item</h2>
					</div>
					<div class="col-6 filter-icon">
						<i class="fas fa-filter"></i>
					</div>
				</div>
				<!-- filter for mob end -->

				<div class="shop-left">
					
					<!-- price filter start -->
					<div class="price-filter">
						<h2>filter by price</h2>

						<form action="{{(route('shopFilter',$subcat->slug))}}">
							<div class="row">

								<!-- min price start -->
								<div class="col-md-4">
									<label>Min</label>
								<input type="number"  class="form-control" required name="min_price" value="{{$minPrice}}">
								</div>
								<!-- min price end -->

								<!-- max price start -->
								<div class="col-md-4">
									<label>Max</label>
									<input type="number"  class="form-control" required name="max_price" value="{{$maxPrice}}">
								</div>
								<!-- max price end -->

								<!-- submit start -->
								<div class="col-md-4">
									<button class="filter-button">Filter</button>
								</div>
								<!-- submit end -->

							</div>

						</form>
						

	                </div>
					<!-- price filter end -->

                    <!-- type start -->
                    <div class="type">
						<h2>All item</h2>
						@foreach(App\Models\Backend\Category::orderBy('id','asc')->where('parent_id','!=',0)->where('is_delete',0)->get() as $subCat) 
                    	<a href="{{route('shop',$subCat->slug)}}">
							<label class="custom_checkbox"
							 
							onclick="event.target.parentNode.click();">
								{{ $subCat->name }}
								<input type="checkbox"
								
								>
								<span class="checkmark"></span>
						  </label>
						</a>
						@endforeach
                    </div>
                    <!-- type end -->


				</div>

			</div>
			<!-- left part end -->


			<!-- right part start -->
			<div class="col-md-9">
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
							@foreach( $products as $product  )
							<div class="col-md-3 col-6 product-hover">
								<div class="product-item-01">
									<div class="product-hover-item">
										<a class="show-product-popup" id="{{$product->id}}">
	                                    	<i class="fas fa-eye"></i>
	                                  	</a>
									</div>

									<!-- main thumbnail -->
									<a href="{{ route('productDetails', $product->slug) }}">
										<img src="{{asset('images/product/'.$product->images[0]->image )}}" class="img-fluid">
									</a>
									<!-- main thumbnail -->

									<!-- go product details -->
									<p>{{ $product->name }}</p>
									@if($product->offer_price==NULL)
									<span>{{$product->regular_price}} </span>
									@else
									<span>{{$product->offer_price}} </span>
									<span> <del> {{$product->regular_price}} </del></span>
									@endif
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
							<!-- product item end -->
							
							<!-- product quick view popup start -->
							<div class="product-quick-view {{$product->id}}">
								<i class="fas fa-times hide-quick-view"></i>
								<div class="container">
									<div class="row">
										<div class="col-md-12 product-quick-view-main-box" >
											
											<div class="row">
												<!-- left part start -->
												<div class="col-md-6">
													<div class="product-main-img">
															<img src="{{asset('images/product/'.$product->images[0]->image) }}" class="img-fluid to-img1 ">
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
																	{{ $product->description }}
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
								{{ $products->links() }}
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