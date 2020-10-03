@extends('backend.template.layout')

@section('body-content')
<!-- main content start -->
<div class="main-content">
    <div class="container-fluid">
        
        <!-- page indicator start -->
        <section class="page-indicator">
            <div class="row">
                <div class="col-md-5">
                    <ul>
                        <li>
                            <i class="fas fa-truck-loading"></i>
                        </li>
                        <li>
                            Delivered Order
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 text-right">
                    <ul>
                        <li>
                            <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#dateToDate">
                                Download Date to Date
                              </button>
                              <!-- Modal -->
                                <div class="modal fade" id="dateToDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Download Date To Date</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('report_picker') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Date From</label>
                                                    <input type="date" class="form-control" name="from">
                                                </div>
                                                <div class="form-group">
                                                    <label>Date To</label>
                                                    <input type="date" class="form-control" name="to">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </li>
                        <li>
                            <a class="btn btn-outline-secondary"  href="{{route('download_today')}}">Download Todays history</a>
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
                                    @if( $invoice->status == 3 )
                                    <span class="badge badge-success">Delivered</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('delivered.invoice.show',$invoice->id) }}" class="btn btn-primary" target="__blank">view order</a>
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