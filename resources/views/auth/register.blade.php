<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Amru Bazar - Register</title>

	<!-- Favicon -->
	<link type="image/gif" rel="shortcut icon" href="{{ asset('backend/images/fav.png') }}">

	<!-- fonts file -->
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

	<!-- data table css start -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

	<!-- font awesome file 4.7.0 css -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome.min.css') }}"> 

	<!--- Font Awesome CSS 5 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"> 

	<!-- main bootstrap file -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/bootstrap.min.css') }}"> 

	<!-- the main css file -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/style.css') }}"> 

	<!-- responsive css file -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/responsive.css') }}"> 

</head>



<!-- login section start -->
<section class="auth">
    <div class="container">
        <div class="row auth-row">
            
            <div class="auth-box">
                <div class="auth-form">

                    @if( session()->has('deleteSuccess') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('deleteSuccess') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if( session()->has('registerFailed') )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Sorry!</strong> {{ session()->get('registerFailed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <!-- logo start -->
                    <div class="auth-logo">
                        @foreach( App\Models\Backend\Logo::get() as $logo )
                        <img src="{{ asset('images/logo/'. $logo->image) }}" width="100px" class="img-fluid" alt=""> 
                        @endforeach  
                    </div>
                    <!-- logo end -->

                    <!-- form start -->
                    <form method="POST" action="{{ route('register.superadmin') }}">
                    @csrf

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" id="inlineFormInputGroup name" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                </div>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inlineFormInputGroup email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email"> 
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inlineFormInputGroup password" placeholder="Password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inlineFormInputGroup password-confirm" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="submit-btn">Register</button>
                        </div>
                        
                    </form>
                    <!-- form end -->

                    <!-- card start -->
                    <div class="auth-card">
                        <a href="{{ route('login') }}">Already registered? Go to login page</a>
                    </div>
                    <!-- card end -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- login section end -->





<!-- jquery lib file -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- jqeury ui js -->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!-- the main bootstrap file -->
	<script type="text/javascript" src="{{ asset('backend/js/bootstrap.min.js') }}" ></script>

	<!-- data table js -->
	<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	
	<!-- the main js file -->
	<script type="text/javascript" src="{{ asset('backend/js/main.js') }}" ></script>


</body>
</html>










