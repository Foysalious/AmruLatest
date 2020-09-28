@extends('frontend.template.layout')

@section('body-content')

<!-- signup page start -->
<section class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-12 login-box">
				
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<a href="index.php">
							<img src="{{ asset('frontend/images/logo.png') }}" class="img-fluid">
						</a>
					</div>
				</div>
				<form action="{{ route('register.customer') }}" method="post">
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" name="name">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email">
					</div>

					<div class="form-group">
						<label>password</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="form-group">
						<button class="btn" type="submit">sign up</button>
					</div>
				</form>
				<div class="row">
					<div class="col-md-12 text-center">
						<a href="{{ route('customerlogin') }}" style="display: inline-block;margin: 15px 0;">already registered? go to login page</a>						
					</div>
				</div>
				<div class="row login-bottom">
					<div class="col-md-12">
						<ul>
							<li>
								<a href="">
									<img src="{{asset('Frontend/images/login.png')}}">
								</a>
							</li>
							<li>
								<a href="">
									<img src="{{asset('Frontend/images/loginfb.png')}}">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
<!-- signup page end -->