@extends('frontend.template.layout')

@section('body-content')

<section class="sub-cat-section section-padding">
    <div class="container">
        <div class="row">
            
            <!-- item start -->
            @foreach( App\Models\Backend\Category::orderBy('id','desc')->where('is_delete',0)->where('parent_id',$category->id)->get()   as $subCat )
            <div class="col-md-2">
                <div class="sub-cat-item">
                <a href="{{route('shop',$subCat->slug)}}">
                        <img src="{{ asset('images/category/'.$subCat->image) }}" alt="">
                    <p class="text-center">{{$subCat->name}}</p>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- item end -->

        </div>
    </div>
</section>

@endsection