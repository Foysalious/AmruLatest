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
                            categories
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
            </div>
            <!-- flash message row end -->

            <!-- add row start -->
            <div class="row add-row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        add new category
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">category</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label>category name *</label>   
                                        <input type="text" class="form-control" required name="name">                                 
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>category icon image</label>
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" name="icon" id="image">                                 
                                            </div>                                      
                                        </div>    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>category thumbnail image</label>   
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container_2" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" name="thumbnail" id="image2">                                 
                                            </div>                                        
                                        </div>                                 
                                    </div>
                                    <div class="form-group">
                                        <label>please define category</label>
                                        <select name="parent_id" class="form-control" required>
                                            <option value="NAN">Select Category</option>
                                            <option value="0">parent category</option>             
                                            @foreach( App\Models\Backend\Category::orderBy('id')->where('parent_id',0)->get() as $parent_category )             
                                            <option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>   
                                            @endforeach               
                                        </select>
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
                                <td>Category Icon</td>
                                <td>category name</td>
                                <td>type</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach($categories as $category)
                            <tr>
                                <th>{{ $i }}</th>
                                <td>
                                    @if( $category->icon_image != NULL )
                                    <img src="{{ asset('images/category/'.$category->icon_image) }}" class="img-fluid" width="50px" alt="">
                                    @else
                                    <p class="badge badge-danger">No image uploaded</p>
                                    @endif
                                </td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    @if( $category->parent_id == 0 )
                                    <p class="badge badge-success">Parent category</p>
                                    @else
                                   <p class="badge badge-primary">{{ $category->parent->name }}</p>
                                    @endif
                                </td>
                                <td>
                                
                                <!-- edit start -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $category->id }}">
                                    edit
                                </button>
                                <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">category</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group">
                                                    <label>category name</label>   
                                                    <input type="text" class="form-control" required name="name" value="{{ $category->name }}">                                 
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>category icon image *</label>
                                                            <img src="{{ asset('images/category/'. $category->icon_image) }}"  width="100px" alt=""> 
                                                            <input type="file" class="form-control-file" name="icon">                                 
                                                        </div>                                      
                                                    </div>    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>category thumbnail image</label>   
                                                            <img src="{{ asset('images/category/' . $category->thumbnail) }}" width="100px" alt=""> 
                                                            <input type="file" class="form-control-file" name="thumbnail" >                                 
                                                        </div>                                        
                                                    </div>                                 
                                                </div>
                                                <div class="form-group">
                                                    <select name="parent_id" class="form-control" required>
                                                        <option value="0">parent category</option>             
                                                        @foreach( App\Models\Backend\Category::orderBy('id')->where('parent_id',0)->get() as $parent_category )             
                                                        <option value="{{ $parent_category->id }}"

                                                        @if( $category->parent_id == $parent_category->id )
                                                        selected
                                                        @endif
                                                        
                                                        >{{ $parent_category->name }}</option>   
                                                        @endforeach               
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button>                                    
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit end -->

                                <!-- delete start -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $category->id }}">
                                    delete
                                </button>
                                <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">category delete</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('category.delete', $category->id) }}" method="post">
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