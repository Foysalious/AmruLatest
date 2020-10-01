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
                            <i class="fas fa-window-close"></i>
                        </li>
                        <li>
                            cancelled Order
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">

            <!-- flash message row start -->
            <div class="row">
                <div class="col-md-12">
                    @if( session()->has('delivered') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('delivered') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif  
                    @if( session()->has('cancelled') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('cancelled') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif              
                </div>
            </div>
            <!-- flash message row end -->


            <!-- manage row start -->
            
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <td>Invoice Id</td>
                                <td>Data</td>
                                <td>Customer Name</td>
                                <td>Phone Number</td>
                                <td>Address</td>
                                <td>Total</td>
                                <td>Status</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($invoices as $invoice)
                            <tr class="text-center">
                                <th>#{{ $invoice->id }}</th>
                                <td>
                                    {{ $invoice->created_at->toDayDateTimeString() }}
                                </td>
                                <td>
                                    {{ $invoice->user->name }}
                                </td>
                                <td>
                                    {{ $invoice->phone }}
                                </td>

                                <td>
                                    {{ $invoice->delivery_address }}
                                 </td>

                                <td>
                                    {{ $invoice->total }} Taka
                                </td>

                                <td>
                                    @if( $invoice->status == 4 )
                                    <span class="badge badge-danger">cancelled</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('cancel.invoice.show',$invoice->id) }}" class="btn btn-primary" target="__blank">view order</a>
                                </td>

                            </tr>
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