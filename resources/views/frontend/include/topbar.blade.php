<!-- topbar middle start -->
<section class="topbar-bottom for-pc">
	<div class="container">
		
		<!-- row start -->
		<div class="row">
			
			<!--- logo start -->
			<div class="col-md-3 topbar-logo">
				<a href="{{ route('index') }}">
					<img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid">
				</a>
			</div>
			<!--- logo end -->

			<!-- search option start -->
			<div class="col-md-6">
				<div class="topbar-bottom-search">
					<form action="" method="">
						<div class="form-group">
							<input type="search" class="form-control" name="" placeholder="Search For Products">
						</div>

						<div class="form-group search-button">
							<input type="submit" class="form-control" value="Search" name="">
						</div>
					</form>
				</div>
			</div>
			<!-- search option end -->

			<!-- cart wishlist start -->
			<div class="col-md-3" style="position: relative">
				<div class="cart-wishlist">
					<ul>

						<li class="cart-pc" id="cart-pc" onmouseover="showCart()" onmouseout="hideCart()" >
							<img src="{{ asset('frontend/images/cart.png') }}" class="img-fluid">

							<!-- cart number start -->
							<div class="cart-number">
								<p>5</p>
							</div>
							<!-- cart number end-->
						</li>
						

						<li>
							
								@auth
								<a href="{{ route('profile') }}">
									<img src="{{ asset('frontend/images/user.png') }}" class="img-fluid">
								</a>
								
								@else
								<a href="{{ route('customerlogin') }}">
									<img src="{{ asset('frontend/images/user.png') }}" class="img-fluid">
								</a>
								
								@endauth
							
						</li>
					</ul>
				</div>

				<!-- cart dropdown list start -->
				<div class="cart-item" id="cart-item" onmouseover="showCart()" onmouseout="hideCart()">
					<table class="table table-striped">
						<thead>
						<tbody>
						  <tr>
							<td>
								<img src="{{ asset('frontend/images/12-1-170x185.jpg') }}" width="32px" alt="">
							</td>
							<td>
								<p>product name</p>
								<p>150 taka</p>
								<p>3x</p>
							</td>
							<td>
								<button class=""><i class="fas fa-times"></i></button>
							</td>
						  </tr>
						  <tr>
							<td>
								<img src="{{ asset('frontend/images/9-1-170x185.jpg') }}" width="32px" alt="">
							</td>
							<td>
								<p>product name</p>
								<p>150 taka</p>
								<p>3x</p>
							</td>
							<td>
								<button class=""><i class="fas fa-times"></i></button>
							</td>
						  </tr>
						</tbody>
					</table>
					<div class="cart-button">
						<button class="view-cart">view cart</button>
						<button class="view-checkout">checkout</button>
					</div>
				</div>
				<!-- cart dropdown list end -->

			</div>
			<!-- cart wishlist end -->

		</div>
		<!-- row end -->

	</div>
</section>
<!-- topbar middle end -->




<!-- topbar mobile start -->
<section class="topbar-mob">
	<div class="container">
		<div class="row">

			
			<!-- logo start -->
			<div class="col-8 topbar-mob-img">
				<a href="{{ route('index') }}">
					<img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid">
				</a>
			</div>
			<!-- logo end -->

			<!-- search option start -->
			<div class="col-4 navbar-mob-right">
			    <ul>
			        <li class="search-mob">
			            <i class="fas fa-search "></i>
			        </li>
			        <li class="menu-dropdown-mob for-mob">
			            <i class="fas fa-bars show-nav"></i>
                	    <i class="fas fa-times hide-nav"></i>
			        </li>
			    </ul>
				
			</div>
			<!-- search option end -->

		</div>
	</div>

	<!-- search mobile -->
	<div class="topbar-bottom-search">
		<form action="search" method="post">
					<input type="hidden" name="_token" value="Ot2KJv0V4qb7eLdpINXvc1Cbmh72KZd6P9FTxdLe">			<div class="form-group">
				<input type="search" class="form-control" name="search" placeholder="Search For Products">
			</div>

			<div class="form-group search-button">
				<input type="submit" class="form-control" value="Search" name="">
			</div>
		</form>
	</div>
	<!-- search end -->
</section>
<!-- topbar mobile end -->


<section class="topbar-bottom-mob">

	<!-- show item start -->
	<div class="show-item p1">
		<h2>phone</h2>
		<p>01755-060693</p>
	</div>
	<!-- show item end -->

	<!-- show item start -->
	<div class="show-item p2">
		<h2>E-Mail</h2>
		<p>info@amrubazarbd.com</p>
	</div>
	<!-- show item end -->

	<!-- show item start -->
	<div class="show-item p3">
		<h2>Location</h2>
		<p>Dobadia bazar Uttar khan
			Uttara Dhaka 1230
			1230 Dhaka, Bangladesh</p>
	</div>
	<!-- show item end -->

	<!-- show item start -->
	<div class="show-item p4">
		<table class="table table-striped">
			<thead>
			<tbody>
			  <tr>
				<td>
					<img src="{{ asset('frontend/images/12-1-170x185.jpg') }}" width="32px" alt="">
				</td>
				<td>
					<p>product name</p>
					<p>150 taka</p>
					<p>3x</p>
				</td>
				<td>
					<button class=""><i class="fas fa-times"></i></button>
				</td>
			  </tr>
			  <tr>
				<td>
					<img src="{{ asset('frontend/images/9-1-170x185.jpg') }}" width="32px" alt="">
				</td>
				<td>
					<p>product name</p>
					<p>150 taka</p>
					<p>3x</p>
				</td>
				<td>
					<button class=""><i class="fas fa-times"></i></button>
				</td>
			  </tr>
			</tbody>
		</table>
		<div class="cart-button">
			<button class="view-cart">view cart</button>
			<button class="view-checkout">checkout</button>
		</div>
	</div>
	<!-- show item end -->

	<!-- show item start -->
	<div class="show-item p5">
		<a href="customer/profile">login or register</a>
	</div>
	<!-- show item end -->

	<div class="container">

		<div class="row">
			<div class="col-1"></div>
			<!-- phone start -->
			<div class="col-2 show-item-mob" id="p1">
				<img src="{{ asset('frontend/images/phone.png') }}" class="img-fluid">
			</div>
			<!-- phone end -->

			<!-- email start -->
			<div class="col-2 show-item-mob" id="p2">
				<img src="{{ asset('frontend/images/email.png') }}" class="img-fluid">
			</div>
			<!-- email end -->

			<!-- map start -->
			<div class="col-2 show-item-mob" id="p3">
				<img src="{{ asset('frontend/images/map.png') }}" class="img-fluid">
			</div>
			<!-- map end -->

			<!-- dollar start -->
			<div class="col-2 show-item-mob" id="p4">
				<!-- cart number start -->
				<div class="cart-number">
					<p>5</p>
				</div>
				<!-- cart number end-->
				<img src="{{ asset('frontend/images/cart.png') }}" class="img-fluid">
			</div>
			<!-- dollar end -->

			<!-- user start -->
			<div class="col-2 show-item-mob" id="p5">
				<img src="{{ asset('frontend/images/user.png') }}" class="img-fluid">
			</div>
			<!-- user end -->
			<div class="col-1"></div>
		</div>

	</div>

</section>