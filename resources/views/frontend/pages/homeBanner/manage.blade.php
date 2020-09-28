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
                            Banner Image
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- page indicator end -->

        <!-- dashbaord statistics seciton start -->
        <section class="statistics">

            <!-- flash message row start -->

            <!-- flash message row end -->

            <!-- add row start -->
            <div class="row add-row">
                <div class="col-md-12 text-right">
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        add Banner Image
                    </button> --}}

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
                                <form action="{{ route('bannerStore') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Right image</label>
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" name="right_image" id="image">                                 
                                            </div>                                      
                                        </div>    
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Left Image</label>   
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container_2" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" name="left_image" id="image2">                                 
                                            </div>                                        
                                        </div>  
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bottom Image</label>   
                                                <img src="{{ asset('backend/images/thumbnail.jpg') }}" id="image_preview_container_2" class="default-thhumbnail" width="100px" alt=""> 
                                                <input type="file" class="form-control-file" name="bottom_image" id="image2">                                 
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
                                <td>Left Banner</td>
                                <td>Right Banner</td>
                                <td>Bottom Banner</td>
                                <td>action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach($images as $image)
                            <tr>
                                <th>{{ $i }}</th>
                                <td>
                                    @if( $image->left_image != NULL )
                                    <img src="{{ asset('images/addImages/'.$image->left_image) }}" class="img-fluid" width="50px" alt="">
                                    @else
                                    <p class="badge badge-danger">image uploaded</p>
                                    @endif
                                </td>

                                <td>
                                    @if( $image->right_image != NULL )
                                    <img src="{{ asset('images/addImages/'.$image->right_image) }}" class="img-fluid" width="15px" alt="">
                                    @else
                                    <p class="badge badge-danger">No image uploaded</p>
                                    @endif
                                </td>

                                <td>
                                    @if( $image->bottom_image != NULL )
                                    <img src="{{ asset('images/addImages/'.$image->bottom_image) }}" class="img-fluid" width="50px" alt="">
                                    @else
                                    <p class="badge badge-danger">No image uploaded</p>
                                    @endif
                                </td>

                                <td>

                                <!-- edit start -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $image->id }}">
                                    edit
                                </button>
                                <div class="modal fade" id="edit{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">category</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('bannerUpdate', $image->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Left Banner</label>
                                                            <img src="{{ asset('images/addImages/'. $image->left_image) }}"  width="100px" alt=""> 
                                                            <input type="file" class="form-control-file" name="left_image">                                 
                                                        </div>                                      
                                                    </div>    
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Right Banner</label>   
                                                            <img src="{{ asset('images/addImages/' . $image->right_image) }}" width="15px" alt=""> 
                                                            <input type="file" class="form-control-file" name="right_image" >                                 
                                                        </div>                                        
                                                    </div>     
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Bottom Banner</label>   
                                                            <img src="{{ asset('images/addImages/' . $image->bottom_image) }}" width="100px" alt=""> 
                                                            <input type="file" class="form-control-file" name="bottom_image" >                                 
                                                        </div>                                        
                                                    </div>                                
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
                                {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $image->id }}">
                                    delete
                                </button> --}}
                                <div class="modal fade" id="delete{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel">Banner delete</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- <div class="modal-footer">
                                            <form action="{{ route('bannerDelete', $image->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success">yes</button>
                                            </form>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        </div> --}}
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