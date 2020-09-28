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
                            product
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
                    @if( session()->has('waste') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('waste') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
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
                    @if( session()->has('trash') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('trash') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif 
                    @if( session()->has('restored') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('restored') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif                
                </div>
            </div>
            <!-- flash message row end -->

            <!-- add row start -->
            <div class="row add-row">
                <div class="col-md-4 text-left">
                    <a href="{{ route('product.trash') }}" class="btn btn-danger">inactive product </a>
                </div>
                <div class="col-md-8 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        add new product
                    </button>

                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">product</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label>product name *</label>   
                                        <input type="text" class="form-control" required name="name">                                 
                                    </div>
                                    <div class="form-group">
                                        <label>product description *</label>   
                                        <textarea type="text" class="form-control" row="10" required name="description"> </textarea>                            
                                    </div>
                                    <div class="form-group">
                                        <label>select product category *</label>
                                        <select name="cat_id" class="form-control" required>
                                            <option  value="NAN">Select product Category</option>     
                                            @foreach( App\Models\Backend\Category::orderBy('id')->where('parent_id','!=',0)->where('is_delete',0)->get() as $parent_category )             
                                            <option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>   
                                            @endforeach               
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Image *</label>
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" required name="main_img" id="image">                                 
                                            </div>                                      
                                        </div>    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Image *</label>   
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container_2" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" required class="form-control-file" name="sub_img_one" id="image2">                                 
                                            </div>                                        
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Image *</label>   
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container_3" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" required class="form-control-file" name="sub_img_two" id="image3">                                 
                                            </div>                                        
                                        </div>                                 
                                    </div>
                                    <div class="form-group">
                                        <label>regular price *</label>
                                        <input type="number" class="form-control" required name="r_price">
                                    </div>
                                    <div class="form-group">
                                        <label>offer price</label>
                                        <input type="number" class="form-control" name="o_price">
                                    </div>
                                    <div class="form-group">
                                        <label>Size (kg)*</label>
                                        <input type="number" min="1" value="1" class="form-control" name="size">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>is this package item?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  id="one" value="1" name="package">
                                                    <label class="form-check-label" for="one">
                                                      Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  checked id="one" value="0" name="package">
                                                    <label class="form-check-label" for="one">
                                                      no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>is this featured item?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="featured" id="two" value="1" >
                                                    <label class="form-check-label" for="two">
                                                      Yes
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  checked id="two" value="0" name="featured">
                                                    <label class="form-check-label" for="two">
                                                      no
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>product status</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  id="three" value="1" name="status">
                                                    <label class="form-check-label" for="three">
                                                      active
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"  checked id="three" value="0" name="status">
                                                    <label class="form-check-label" for="three">
                                                      inactive
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add</button>                                    
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>   

                </div>
            </div>
            <!-- add row end -->


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
                                <td>qty.</td>
                                <td>price</td>
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
                                    {{ $product->quantity }}
                                 </td>

                                <td>
                                    {{ $product->regular_price }}
                                </td>

                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" target="blank" class="btn btn-success">edit</a>

                                    <!-- delete start -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $product->id }}">
                                        delete
                                    </button>
                                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">product temporary delete</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('product.delete', $product->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">yes</button>
                                                </form>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete end -->

                                      
                                      <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#waste{{ $product->id }}">
                                            waste
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="waste{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Waste product</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{ route('waste.product', $product->id) }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" min="1"  name="qty" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

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