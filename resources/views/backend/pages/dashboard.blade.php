@extends('backend.template.layout')

@section('body-content')
<!-- main content start -->
<div class="main-content">
    <div class="container-fluid">
        
        <!-- page indicator start -->
        <section class="page-indicator">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <i class="fas fa-home"></i>
                        </li>
                        <li>
                            dashboard
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">
            <div class="row">
                
                <!--- stat card start -->
                <div class="col-md-3">
                    <a href="{{ route('pending.show') }}">
                        <div class="stat-card">
                            <i class="fas fa-history"></i>
                            <h3>Pending Order</h3>
                            <p>{{ count(App\Models\Order::orderBy('id','desc')->where('status',1)->get()) }}</p>
                        </div>
                    </a>                
                </div>
                <!--- stat card end -->

                 <!--- stat card start -->
                 <div class="col-md-3">
                    <a href="{{ route('confirmed.show') }}">
                        <div class="stat-card">
                            <i class="fas fa-check"></i>
                            <h3>Confirmed Order</h3>
                            <p>{{ count(App\Models\Order::orderBy('id','desc')->where('status',2)->get()) }}</p>
                        </div>
                    </a>                
                </div>
                <!--- stat card end -->

                 <!--- stat card start -->
                 <div class="col-md-3">
                    <a href="{{ route('delivered.show') }}">
                        <div class="stat-card">
                            <i class="fas fa-truck-loading"></i>
                            <h3>Delivered Order</h3>
                            <p>{{ count(App\Models\Order::orderBy('id','desc')->where('status',3)->get()) }}</p>
                        </div>
                    </a>                
                </div>
                <!--- stat card end -->

                 <!--- stat card start -->
                 <div class="col-md-3">
                    <a href="{{ route('cancel.show') }}">
                        <div class="stat-card">
                            <i class="fas fa-window-close"></i>
                            <h3>Cancelled Order</h3>
                            <p>{{ count(App\Models\Order::orderBy('id','desc')->where('status',4)->get()) }}</p>
                        </div>
                    </a>                
                </div>
                <!--- stat card end -->

                <!--- stat card start -->
                <div class="col-md-3">
                    <a href="{{ route('product.show') }}">
                        <div class="stat-card">
                            <i class="fas fa-window-close"></i>
                            <h3>All product</h3>
                            <p>{{ count(App\Models\Backend\Product::orderBy('id','desc')->where('status',1)->get()) }}</p>
                        </div>
                    </a>                
                </div>
                <!--- stat card end -->

                <!--- stat card start -->
                <div class="col-md-3">
                    <a href="{{ route('waste.show') }}">
                        <div class="stat-card">
                            <i class="fas fa-trash"></i>
                            <h3>Waste product</h3>
                            <p>{{ count(App\Models\Backend\Waste::orderBy('id','desc')->get()) }}</p>
                        </div>
                    </a>                
                </div>
                <!--- stat card end -->

            </div>
        </section>
        <!-- dashbaord statistics seciton end -->

    </div>
</div>
<!-- main content end -->
@endsection