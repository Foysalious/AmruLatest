<!-- body content start -->
<div class="body-content">


    <!-- left sidebar pc start -->
    <section class="left-sidebar">
        <div class="container-fluid">
        
            <!-- top part start -->
            <div class="row top-part">

                <!-- middle part start -->
                <div class="col-md-9 col-9">
                    <h3>{{ Auth::user()->name }}</h3>
                    @can('superadmin')
                    <p>Super Admin</p>
                    @endcan
                </div>
                <!-- middle part end -->

                <!-- right part start -->
                <div class="col-md-3 col-3">
                    <img src="images/badge.png" class="img-fluid" alt="">
                </div>
                <!-- right part end -->

            </div>
            <!-- top part end -->

            <!-- navbar item start -->
            <div class="row nav-item">
                <div class="col-md-12">
                    <ul>

                        <!-- nav single view start -->
                        <li >
                            <a href="{{ route('dashboard') }}">
                            <div class="left">
                                    dashboard
                            </div>
                            <div class="right">
                                    <i class="fas fa-home"></i>
                            </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                        <!-- nav single view start -->
                        <li >
                            <a href="{{ route('logo.show') }}">
                            <div class="left">
                                logo
                            </div>
                            <div class="right">
                                <i class="fas fa-bars"></i>
                            </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                        <!-- nav single view start -->
                        <li >
                            <a href="{{ route('category.show') }}">
                            <div class="left">
                                categories
                            </div>
                            <div class="right">
                                <i class="fas fa-bars"></i>
                            </div>
                            </a>
                        </li>
         
                        <!-- nav drop down view start -->
                        <li>
                            <div class="row navbar-dropdown-top" id="1">
                            <div class="col-md-10  col-10">
                                Product Management                   
                            </div>    
                            <div class="col-md-2 col-2 text-right">
                                <i class="fas fa-angle-down"></i>                            
                            </div>                      
                            </div>
                            <div class="row navbar-dropdown-child 1">
                            <div class="col-md-12">
                                <ul>
                                    <li>
                                        <a href="{{ route('supplier.show') }}">
                                            <i class="fas fa-user" style="margin-right: 5px"></i>
                                            supplier management
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('phistory.show') }}">
                                            <i class="fas fa-shopping-bag" style="margin-right: 5px"></i>
                                            purchase history
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('waste.show') }}">
                                            <i class="fas fa-trash" style="margin-right: 5px"></i>
                                            waste product
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product.show') }}">
                                            <i class="fas fa-shopping-bag" style="margin-right: 5px"></i>
                                            All Product
                                        </a>
                                    </li>
                                </ul>                  
                            </div>                        
                            </div>
                        </li>
                        <!-- nav drop down view end -->

                        <!-- nav single view start -->
                        <li >
                            <a href="{{ route('bannerShow') }}">
                            <div class="left">
                                Addvertisement
                            </div>
                            <div class="right">
                                <i class="fas fa-bars"></i>
                            </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                          <!-- nav single view start -->
                          <li >
                            <a href="{{ route('sliderShow') }}">
                            <div class="left">
                                Home Page Slider
                            </div>
                            <div class="right">
                                <i class="fas fa-bars"></i>
                            </div>
                            </a>
                        </li>
                        <!-- nav single view end -->


                    </ul>
                </div>
            </div>
            <!-- navbar item end -->

        </div>
    </section>
    <!-- left sidebar pc end -->