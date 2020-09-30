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
                            edit product
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
                    @if( session()->has('create') )
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congratulation!</strong> {{ session()->get('create') }}
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
            </div>
            <!-- flash message row end -->

            <!-- update row start -->
            <div class="row add-row">
                <div class="col-md-12 text-right">
                    
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label>product name *</label>   
                            <input type="text" value="{{ $product->name }}" class="form-control" required name="name">                                 
                        </div>
                        <div class="form-group">
                            <label>product description *</label>   
                            <textarea type="text" class="form-control" row="10" required name="description">{{ $product->description }} </textarea>                            
                        </div>
                        <div class="form-group">
                            <label>select product category *</label>
                            <select name="cat_id" class="form-control" required>
                                <option disabled selected>Select product Category</option>     
                                @foreach( App\Models\Backend\Category::orderBy('id')->where('parent_id','!=',0)->get() as $parent_category )             
                                <option value="{{ $parent_category->id }}"
                                    @if( $product->cat_id == $parent_category->id )
                                    selected
                                    @endif
                                >{{ $parent_category->name }}</option>   
                                @endforeach               
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Image *</label> <br>
                                    <img src="{{ asset('images/product/'.$product->images[0]->image) }}"  class="default-thhumbnail" width="100px" alt=""> 
                                    <input type="file" class="form-control-file" name="main_img">                                 
                                </div>                                      
                            </div>    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Image *</label>   <br>
                                    <img src="{{ asset('images/product/'.$product->images[1]->image) }}"  class="default-thhumbnail" width="100px" alt="">
                                    <input type="file" class="form-control-file" name="sub_img_one">                                 
                                </div>                                        
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Product Image *</label>   <br>
                                    <img src="{{ asset('images/product/'.$product->images[2]->image) }}"  class="default-thhumbnail" width="100px" alt="">
                                    <input type="file" class="form-control-file" name="sub_img_two">                                 
                                </div>                                        
                            </div>                                 
                        </div>
                        <div class="form-group">
                            <label>regular price *</label>
                            <input type="number" class="form-control" value="{{ $product->regular_price }}" required name="r_price">
                        </div>
                        <div class="form-group">
                            <label>offer price</label>
                            <input type="number" value="{{ $product->offer_price }}" class="form-control" name="o_price">
                        </div>
                        <div class="form-group">
                            <label>Size</label>
                            <input type="text"  value="{{ $product->size }}" class="form-control" name="size">
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>is this package item?</label>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                        @if( $product->is_packaged == 1 )
                                        checked
                                        @endif
                                        type="radio"  id="one" value="1" name="package">
                                        <label class="form-check-label" for="one">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                        @if( $product->is_packaged == 0 )
                                        checked
                                        @endif
                                        type="radio" id="one" value="0" name="package">
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
                                        <input class="form-check-input" 
                                        @if( $product->is_featured == 1 )
                                        checked
                                        @endif
                                        type="radio" name="featured" id="two" value="1" >
                                        <label class="form-check-label" for="two">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                        @if( $product->is_featured == 0 )
                                        checked
                                        @endif
                                        type="radio" id="two" value="0" name="featured">
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
                                        <input class="form-check-input" 
                                        @if( $product->status == 1 )
                                        checked
                                        @endif
                                        type="radio"  id="three" value="1" name="status">
                                        <label class="form-check-label" for="three">
                                            active
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" 
                                        @if( $product->status == 0 )
                                        checked
                                        @endif
                                        type="radio" id="three" value="0" name="status">
                                        <label class="form-check-label" for="three">
                                            inactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">update</button>                                    
                        </div>
                    </form>
                    
  

                </div>
            </div>
            <!-- update row end -->


        </section>
        <!-- dashbaord statistics seciton end -->

    </div>
</div>
<!-- main content end -->
@endsection