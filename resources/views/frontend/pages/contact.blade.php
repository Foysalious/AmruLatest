@extends('frontend.template.layout')

@section('body-content')

<section class="contact-page">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<iframe style="width: 100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.758489377996!2d90.43648361543286!3d23.862708290392558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb1b55ee0ab260ab0!2sDobadia%20Bazar!5e0!3m2!1sen!2sbd!4v1601703839819!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
						<input type="text" class="form-control" placeholder="Name*" name="name">
					</div>
					<div class="form-group">
						<input type="email" class="form-control" placeholder="Email*" name="email">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Phone*" name="phone">
					</div>
					<div class="form-group">
						<textarea class="form-control" rows="3" name="message"></textarea>
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