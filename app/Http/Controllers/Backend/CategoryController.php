<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $categories = Category::orderBy('id','desc')->where('is_delete',0)->get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        if( $request->parent_id == 'NAN' ){
            $request->session()->flash('createFailed','Please select a category');
            return back();
        }
        else{

            $request->validate([
                'name'      => 'required',
                'parent_id' => 'required',
            ]);

            $categories = Category::where('name',$request->name)->first();

            if( $categories ){
                $categories->is_delete = 0;
                $categories->save();
                $request->session()->flash('create','New Category created');
                return back();
            }
            else{
                $category = new Category();
                $category->name = $request->name;
                $category->slug = Str::slug($request->name);
                
                if( $request->icon ){
                    $image  = $request->file('icon');
                    $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
                    $location = public_path('images/category/' . $img);
                    Image::make($image)->save($location);
                    $category->icon_image = $img;
                }
                if( $request->thumbnail ){
                    $image_2 = $request->file('thumbnail');
                    $img_2 = rand(0,5000) .'.'. $image_2->getClientOriginalExtension();
                    $location = public_path('images/category/'. $img_2);
                    Image::make($image_2)->save($location);
                    $category->thumbnail = $img_2;
                }
                $category->parent_id = $request->parent_id;

                $category->save();

                $request->session()->flash('create','New Category created');
                return back();
            }

        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        if( $request->icon ){
            if( File::exists('images/category/'. $category->icon) ){
                File::delete('images/category/'. $category->icon);
            }
            $image  = $request->file('icon');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' . $img);
            Image::make($image)->save($location);
            $category->icon_image = $img;
        }
        if( $request->thumbnail ){
            if( File::exists('images/category/'. $category->thumbnail) ){
                File::delete('images/category/'. $category->thumbnail);
            }
            $image_2 = $request->file('thumbnail');
            $img_2 = rand(0,5000) .'.'. $image_2->getClientOriginalExtension();
            $location = public_path('images/category/'. $img_2);
            Image::make($image_2)->save($location);
            $category->thumbnail = $img_2;
        }
        $category->parent_id = $request->parent_id;

        $category->save();

        $request->session()->flash('update','Category updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        $category->is_delete = 1;
        $category->save();
        $request->session()->flash('delete','Category deleted');
        return back();

    }
}
