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
                            <i class="fas fa-bars"></i>
                        </li>
                        <li>
                            Newsletter
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">

            <!-- flash message row start -->
            {{-- <div class="row">
                <div class="col-md-12">
                    @if( session()->has('create') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('create') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif 
                    @if( session()->has('createFailed') )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('createFailed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif 
                    @if( session()->has('update') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('update') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif 
                    @if( session()->has('delete') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif                
                </div>
            </div> --}}
            <!-- flash message row end -->

          


            <!-- manage row start -->
            <div class="row">

                
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Email</td>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($letters as $letter)
                            <tr>
                                <th>{{ $i }}</th>
                                <td> {{$letter->email}} </td>
                                
                             
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- manage row end -->

        </section>
        <!-- dashbaord statistics seciton end -->

    </div>
</div>
<!-- main content end -->
@endsection