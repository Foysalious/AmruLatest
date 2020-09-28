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
                            <i class="fas fa-trash"></i>
                        </li>
                        <li>
                            waste product history
                        </li>
                    </ul>
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
                                <td>date</td>
                                <td>Image</td>
                                <td>product name</td>
                                <td>waste</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $wastes as $waste )
                            <tr>
                                <td>{{ $waste->created_at->toDayDateTimeString() }}</td>
                                <td>
                                    <img src="{{ asset('images/product/'.$waste->product->images[0]->image) }}" width="50px" alt="">
                                </td>
                                <td>{{ $waste->product->name }}</td>
                                <td>{{ $waste->qty }}</td>
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