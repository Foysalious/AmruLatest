<footer>
	<div class="container">
		<div class="row">
			
			<!-- widget one start -->
			@php
				$contact = App\Models\Backend\Contact::orderBy('id','desc')->first()
			@endphp
		
			<div class="col-md-4">
				<div class="widget">
					<img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid">
				</div>
				<div class="row widget-bottom-row">
					<div class="col-md-2">
						<img src="{{ asset('frontend/images/widget_icon.png') }}" class="img-fluid">
					</div>
					<div class="col-md-10">
						<h2>{{ $contact->phone }}</h2>
						<p>{{ $contact->address }}</p>
						<ul>
							<li>
								<a href="{{ $contact->facebook }}">
									<img src="{{ asset('frontend/images/twitter.png') }}" class="img-fluid">
								</a>
							</li>
							<li>
								<a href="{{ $contact->youtube }}">
									<img src="{{ asset('frontend/images/facebook.png') }}" class="img-fluid">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- widget one end -->

			<!-- widget two start -->
			<div class="col-md-4">
				<div class="widget-two">
					<h2>Categories</h2>
					<div class="row">
						@foreach(App\Models\Backend\Category::orderBy('id','asc')->where('parent_id',0)->where('is_delete',0)->take(8)->get() as $category) 
					 	<div class="col-md-6 col-6">
					 		<a href="{{ route('subcat', $category->slug) }}">
					 			<i class="fas fa-angle-right"></i> {{ $category->name }}
					 		</a>
						 </div>
						 @endforeach
					</div>
					 
				</div>
			</div>
			<!-- widget two end -->

			<!-- widget three start -->
			<div class="col-md-4">
				<div class="widget-two">
					<h2>quick links</h2>
					 
					<div class="row">
					 	<div class="col-md-6 col-6">
					 		<a href="">
					 			<i class="fas fa-angle-right"></i> food items
					 		</a>
					 	</div>
					 	
					</div>

				</div>
			</div>
			<!-- widget three end -->

		</div>
	</div>
</footer>


<!-- footer bottom start -->
<section class="footer-bottom">
	<div class="container">
		<div class="row">
			
			<!-- left part start -->
			<div class="col-md-6">
				<p>©SSTTech. All rights reserved 2020</p>
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-6 footer-bottom-right">
				<!-- <ul>
					<li>
						<li>
							<a href="">
								<img src="{{ asset('frontend/images/paypal.png') }}" class="img-fluid">
							</a>
						</li>
						<li>
							<a href="">
								<img src="{{ asset('frontend/images/mastercard.png') }}" class="img-fluid">
							</a>
						</li>
						<li>
							<a href="">
								<img src="{{ asset('frontend/images/visa.png') }}" class="img-fluid">
							</a>
						</li>
					</li>
				</ul> -->
			</div>
			<!-- right part end -->

		</div>
	</div>
</section>
<!-- footer bottom end -->