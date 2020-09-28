<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Logo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::orderBy('id','desc')->get();
        return view('backend.pages.logo.manage', compact('logos'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        $request->validate([
            'image' => 'required',
        ]);
        if( $request->image ){
            if( File::exists('images/logo/'. $logo->image) ){
                File::delete('images/logo/'. $logo->image);
            }
            $image = $request->file('image');
            $img = rand(0,100) .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/logo/'.$img);
            Image::make($image)->save($location);
            $logo->image = $img;
        }
        $logo->save();
        $request->session()->flash('update','New logo added');
        return back();
    }

}
