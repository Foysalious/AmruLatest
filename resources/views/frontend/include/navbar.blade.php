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
				@foreach( App\Models\Backend\Logo::all() as $logo )
				<a href="{{ route('index') }}">
					<img src="{{ asset('images/logo/'.$logo->image) }}" width="150px" class="img-fluid">
				</a>
				@endforeach
			</li>
			@foreach( App\Models\Backend\Link::orderBy('id','desc')->get() as $link )
			<li>
				<a href="{{ $link->link }}">
					<i class="fas fa-angle-right"></i> {{ $link->title }}
				</a>
			</li>
			@endforeach
			@foreach(App\Models\Backend\Category::orderBy('id','asc')->where('parent_id',0)->where('is_delete',0)->get() as $pcategory) 
			<li>
				<div class="row nav-mega-menu" id="{{ $pcategory->id }}">
					<div class="col-8">
						<p>{{ $pcategory->name }}</p>
					</div>
					<div class="col-4 nav-mega-menu-icon">
						<i class="fas fa-chevron-down"></i></a>
					</div>
				</div>

				@foreach( App\Models\Backend\Category::orderBy('id','asc')->where('parent_id',$pcategory->id)->where('is_delete',0)->get() as $subCat  )
				<div class="row mega-menu-mob {{ $pcategory->id }}">
					<div class="col-md-12">
						<a href="{{route('shop',$subCat->slug)}}">{{ $subCat->name }}</a>
					</div>
				</div>
				@endforeach
				
			</li>
			@endforeach
		</ul>
	</div>
	<!-- fixed menu end -->

</section>
<!-- navbar drop down for mob start -->


















