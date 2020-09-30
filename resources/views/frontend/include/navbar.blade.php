<!-- navbar start -->
<section class="navbar-pc">
	<div class="container">
		<div class="row">
			<div class="nav-carousel owl-carousel owl-theme">
				
				<!-- navbar item start -->
				@foreach(App\Models\Backend\Category::orderBy('id','asc')->where('parent_id',0)->where('is_delete',0)->get() as $category) 
				<div class="item">
				<a href="{{ route('subcat', $category->slug) }}">
						<div class="col-md-12 nav-cat-item">
							<img src="{{ asset('images/category/'.$category->icon_image) }}" class="img-fluid">
						</div>
					</a>
					<p style="font-weight: bold; text-align: center" >{{$category->name}}</p>
				</div>
				<!-- navbar item end -->
				@endforeach

				
				<!-- navbar item end -->

			</div>
		</div>
	</div>
</section>
<!-- navbar end -->




















<!-- navbar drop down for mob start -->
<section class="menu-dropdown-mob">

	<!-- fixed menu start -->
	<div class="fixed-menu-mob">
		<ul>
			<li>
				<a href="index.php">
					<img src="images/logo.png" class="img-fluid">
				</a>
			</li>
			<li>
				<div class="row nav-mega-menu">
					<div class="col-8">
						<a href="">all department </a>
					</div>
					<div class="col-4 nav-mega-menu-icon">
						<i class="fas fa-chevron-down"></i></a>
					</div>
				</div>

				<div class="row mega-menu-mob">
					<div class="col-md-12">
						<a href="">item one</a>
					</div>
					<div class="col-md-12">
						<a href="">item two</a>
					</div>
					<div class="col-md-12">
						<a href="">item three</a>
					</div>
					<div class="col-md-12">
						<a href="">item four</a>
					</div>
				</div>
				
			</li>
			<li>
				<a href="">baby food</a>
			</li>
			<li>
				<a href="">meat</a>
			</li>
			<li>
				<a href="">fish item</a>
			</li>
			<li>
				<a href="">dairy product</a>
			</li>
			<li>
				<a href="">others</a>
			</li>
			<li>
				<a href="">all items</a>
			</li>
		</ul>
	</div>
	<!-- fixed menu end -->

</section>
<!-- navbar drop down for mob start -->


















