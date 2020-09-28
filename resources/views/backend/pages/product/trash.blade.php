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
                            <i class="fas fa-shopping-bag"></i>
                        </li>
                        <li>
                            trash product
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
                    @if( session()->has('restored') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('restored') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif  
                    @if( session()->has('pDelete') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('pDelete') }}
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
                                <td>Id</td>
                                <td>Image</td>
                                <td>name</td>
                                <td>category</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($products as $key => $product)
                            <tr class="text-center">
                                <th>{{ $key + 1}}</th>
                                <td>
                                    <img src="{{ asset('images/product/'.$product->images[0]->image) }}" class="img-fluid" width="50px" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                   {{ $product->category->name }}
                                </td>

                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" target="blank" class="btn btn-primary">edit</a>

                                    <form action="{{ route('product.restore', $product->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            restore
                                        </button>
                                    </form>

                                    <!-- delete start -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $product->id }}">
                                        delete permanently
                                    </button>
                                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">are you sure want to delete this product permanently</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('product.pDelete', $product->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">yes</button>
                                                </form>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete end -->
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