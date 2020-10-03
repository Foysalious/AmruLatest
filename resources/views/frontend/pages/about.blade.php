@extends('frontend.template.layout')

@section('body-content')

<!-- about us section start -->
<section class="about">
	<div class="container">
		<div class="row">

			<!-- left part start -->
			<div class="col-md-6 about-img">
				<img src="{{ asset('frontend/images/about.png') }}" class="img-fluid">
			</div>
			<!-- left part end -->

			<!-- right part start -->
			<div class="col-md-6">
				@foreach( App\Models\Backend\About::orderBy('id','desc')->get() as $about)
				<div class="right">
					{!! $about->description !!}
				</div>
				@endforeach
			</div>
			<!-- right part end -->

		</div>
	</div>
</section>
<!-- about us section end -->



@endsection