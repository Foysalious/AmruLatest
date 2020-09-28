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
                            <i class="fas fa-history"></i>
                        </li>
                        <li>
                            purchase history
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if( session()->has('success') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('success') }}
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
            </div>

        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">

            <!-- manage row start -->
            <div class="row">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped" id="myTable">
                        <thead>
                            <tr>
                                <td>supplier name</td>
                                <td>address</td>
                                <td>phone no.</td>
                                <td>quantity</td>
                                <td>date</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(App\Models\Backend\InventoryInvoice::orderBy('id','asc')->get() as $invoice) 
                            <tr>
                                <th>{{$invoice->name}}</th>
                                <th>{{$invoice->address}}</th>
                                <th>{{$invoice->contact}}</th>
                                <th>
                                    {{ $invoice->order->sum('qty')}}
                                </th>
                                <th>{{$invoice->created_at->toDayDateTimeString()}}</th>
                                <th>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong{{ $invoice->id }}">
                                        view product
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-lg" id="exampleModalLong{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                all product buy from of mr.{{ $invoice->name }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                                <div class="modal-body">
                                                
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <td>id</td>
                                                                <td>image</td>
                                                                <td>name</td>
                                                                <td>quantity</td>
                                                                <td>unit price</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach( $invoice->order as $key => $order  )
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>
                                                                    <img src="{{ asset('images/product/'.$order->product->images[0]->image) }}" width="32px" alt="">
                                                                </td>
                                                                <td>{{ $order->name }}</td>
                                                                <td>{{ $order->qty }}</td>
                                                                <td>{{ $order->unit_price }} taka</td>
                                                            </tr>
                                                           @endforeach
                                                        </tbody>
                                                    </table>

                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <!-- invoice delete -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletehistory{{ $invoice->id }}">
                                        delete
                                    </button>
                                    <div class="modal fade bd-example-modal-lg" id="deletehistory{{ $invoice->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">
                                                Are you sure want to delete mr.{{ $invoice->name }}'s history
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('history.delete', $invoice->id) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">yes</button>
                                                </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </th>

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
