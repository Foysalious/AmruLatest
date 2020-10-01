<!DOCTYPE html>
<html>
<head>
	<title>Inovoice</title>
	<style type="text/css">
		
		body{
			position: relative;
		    height: 100vh;
		    margin: 0;
		}
		h1{
			text-transform: capitalize;
			font-size: 16px;
			margin: 5px 0;
		}
		h2{
			text-transform: capitalize;
			font-size: 16px;
			margin: 5px 0;
		}
		p{
			text-transform: capitalize;
			font-size: 13px;
			margin: 5px 0;
		}
		tr, td{
			text-transform: capitalize;
		}
		.body-content{
			position: absolute;
		    width: 70%;
		    left: 50%;
		    top: 0;
		    transform: translateX(-50%);
		    box-shadow: #E5E5E5 0px 0px 11px 5px;
		    overflow: hidden;
		}
		.topbar{
			background-position: bottom;
		    background-repeat: no-repeat;
		    background-size: cover;
		    padding: 40px;
		    position: relative;
		    width: 100%;
		    left: -25px;
		    top: 0;
		}
		.topbar-logo img{
			width: 10%;
		}
		.topbar-dark-img{
			position: absolute;
		    width: 100%;
		    height: 100%;
		    top: 0;
		    left: 0;
		}
		.topbar-dark-img img{
			position: absolute;
		    right: 40px;
		    width: 30%;
		    top: -100px;
		}
		.topbar-bottom{
			width: 100%;
			display: flex;
			padding: 0;
		}
		.topbar-bottom .left, .topbar-bottom .right{
			padding: 0 15px;
		}
		.topbar-table{
			width: 100%;
		}
		.topbar-table{
			padding: 15px 0;
		}
		.topbar-table table{
			padding: 0 15px;
		}
		.topbar-table table tr td{
			width: 16.66%;
			text-align: center;
			padding: 5px;
			font-size: 13px;
		}
		.topbar-payment{
			width: 100%;
			display: flex;
		}
		.topbar-payment .left, .topbar-payment .right{
			width: 50%;
			padding: 0 15px;
		}
		.topbar-payment .right .right-box{
			background-color: #F2F4F7;
			display: flex;
			width: 100%;
		}
		.topbar-payment .right .right-box .left-part,
		.topbar-payment .right .right-box .right-part{
			width: 50%;
			text-align: center;
		}
		.topbar-payment .right .right-box .left-part p,
		.topbar-payment .right .right-box .right-part p{
			margin: 5px 0;
		}	
		.sign-option{
			width: 100%;
			display: flex;
		}
		.sign-option{
			padding: 50px 0 0 15px;
		}
		.sign-option p{
			position: relative;
		}
		.sign-option p::after{
			content: "";
			background: #000000;
		    position: absolute;
		    left: 50%;
		    top: -5px;
		    height: 1px;
		    width: 50%;
		    z-index: 3;
		    transform: translateX(-50%);
		}
		.bottom-style{
			background-size: cover;
    		background-position: center;
    		height: 10vh;
		}
		.topbar-table table tbody tr{
			background: #F2F4F7;
		}
		.topbar-table table tbody tr:nth-child(odd){
			background: #E9ECF2;
		}	
		.topbar-payment .right td{
			width: 50%;
			text-align: center;
		}
		.topbar-payment .right table tbody tr{
			background: #F2F4F7;
		}
		.topbar-payment .right table tbody tr:nth-child(odd){
			background: #E9ECF2;
		}
		.badge-success{
            background: green;
            border-radius: 5px;
            padding: 5px 10px;
            display: inline-block;
            color: white;
        }
	</style>
</head>
<body style="position: relative;">
	<!-- body content start -->
	<div class="body-content" >
		
		<!-- topbar start -->
		<div class="topbar" style="background-image: url(images/invoice.png);">
			<!-- topbar left start -->
			<div class="topbar-logo" style="width: 50%;">
                <img src="{{ asset('frontend/images/logo.png') }}">
			</div>
            <!-- topbar left end -->
		</div>
		<!-- topbar end -->
		<!-- topbar bottom start -->
		<div class="topbar-bottom">
			
			<!-- left part start -->
			<div class="left" style="width: 50%">
				<h2 class="badge-success">Order is now in confirmed.</h2>
				<h2>Order Id : #{{ $invoice['id'] }}</h2>
                <h2>Order Date :  {{ $invoice['created_at'] }}</h2>
                <h2>Order Confirmed</h2>
			</div>
			<!-- left part end -->
			<!-- left part start -->
			<div class="right" style="width: 50%">
				<h2>Amrubazar Bd</h2>
				<h2>+880 1755060693</h2>
				<h2 style="text-transform: lowercase">Email: info@amrubazzar.com</h2>
			</div>
			<!-- left part end -->
		</div>
		<!-- topbar bottom end -->
		<!-- topbar table start -->
		<div class="topbar-table" style="overflow: scroll; overflow-y:hidden;" >
			<table style="width: 100%;">
				<tr>
					<td style="background-color: #502A6A; color:white;"  >Image</td>
					<td style="background-color: #BE2670; color:white;" >Product Name</td>
					<td style="background-color: #502A6A; color:white;" >Unit Price</td>
					<td style="background-color: #BE2670; color:white;" >Qty</td>
					<td style="background-color: #502A6A; color:white;" >Total</td>
				</tr>
				<tbody>
					<!-- item start -->
					@foreach( $invoice->order as $order )
					<tr>
						<td>
							<img width="32px" src="{{ asset('images/product/'. $order['image']) }}" alt="">
						</td>
						<td>{{ $order['product_name'] }} - {{ $order['size']}}</td>
						<td>{{ $order['unit_price'] }} tk</td>
						<td>{{ $order['qty'] }} pcs</td>
						<td>{{ $order['total'] }} tk</td>
					</tr>
					@endforeach
					<!-- item end -->
				</tbody>
			</table>
		</div>
		<!-- topbar table end -->
        
	</div>
	<!-- body content end-->
</body>
</html>