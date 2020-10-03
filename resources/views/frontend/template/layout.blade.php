<!DOCTYPE html>
<html lang="en">
<head>

    @yield('meta') 
    @include('frontend.include.header')
    @include('frontend.include.css')
    
</head>

	@include('frontend.include.topbar')
	@include('frontend.include.navbar')

    @yield('body-content')

    @include('frontend.include.footer')
    @include('frontend.include.script')
    {!! Toastr::message() !!}



</body>
</html>