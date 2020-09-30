@extends('frontend.template.layout')

@section('body-content')

<!-- signup page start -->
<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-12 login-box">
				
				<form action="{{ route('register.customer') }}" method="post">
					@csrf
					<div class="form-group">
						<label>Name *</label>
						<input type="text" class="form-control" name="name" required>
					</div>

					<div class="form-group">
						<label>Email *</label>
						<input type="email" class="form-control" name="email" required>
					</div>

					<div class="form-group">
						<label>password *</label>
						<input type="password" class="form-control" name="password" required>
					</div>

					<div class="form-group">
						<button class="btn" type="submit">sign up</button>
					</div>
				</form>
				<div class="row login-bottom">
					<div class="col-md-12">
						<ul>
							<li class="facebook">
								<a href="">
									<i class="fab fa-facebook-f"></i> facebook
								</a> 
							</li>
							<li class="google">
								<a href="">
									<i class="fab fa-google"></i> google
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<a href="{{ route('customerlogin') }}" style="display: inline-block;margin: 15px 0;">already registered? go to login page</a>						
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
<!-- signup page end -->