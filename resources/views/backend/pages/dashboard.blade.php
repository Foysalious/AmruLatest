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
                    <a href="">
                        <div class="stat-card">
                            <i class="fas fa-home"></i>
                            <h3>item one</h3>
                            <p>15</p>
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