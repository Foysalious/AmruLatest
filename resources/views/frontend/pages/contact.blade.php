@extends('frontend.template.layout')

@section('body-content')

<section class="contact-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d271.2000462311596!2d90.42631220542061!3d23.86058338617854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c5d8d3216c47%3A0xb1d3eb1069221f4d!2sHolan%20-%20Dokkhinkhan%20Rd%2C%20Dhaka%201230!5e0!3m2!1sen!2sbd!4v1601720423628!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">"</iframe>
			</div>
		</div>
	</div>
</section>


<!-- contact form start -->
<section class="contact-form">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form id="createMessage">
				
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Name*" required name="name">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email*" required name="email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Phone*" required name="phone">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" required name="message"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn" value="Send Message" name="">Send</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- contact form end -->

@endsection