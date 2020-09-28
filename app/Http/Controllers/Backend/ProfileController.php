<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.pages.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required'
            ]
        );

        $user->name         = $request->name;
        $user->email        = $request->email;

        if ($request->image) {
            if (File::exists('images/user/' . $user->image)) {
                File::delete('images/user/' . $user->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/user/' . $img);
            Image::make($image)->save($location);
            $user->image = $img;
        }
        $user->save();

        //write success message
        $request->session()->flash('update', ' Profile updated Successfully');

        return back();
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate(
            [
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'cnewpassword' => 'required',
            ]
        );


        if (Hash::check($request->oldpassword, $user->password)) {

            if ($request->newpassword == $request->cnewpassword) {
                $user->password         = Hash::make($request->cnewpassword);
                $user->save();
                $request->session()->flash('passupdatesuccess', 'Password updated');
                return back();
                exit();
            } else {
                $request->session()->flash('updatePassNotMatch', 'New Password and confirm new password are not matched');
                return back();
                exit();
            }
        } else {
            $request->session()->flash('oldpassnotmatch', 'Old password not matched please try again');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $request->validate(
            [
                'password' => 'required',
            ]
        );

        if (Hash::check($request->password, $user->password)) {
            if (File::exists('images/user/' . $user->image)) {
                File::delete('images/user/' . $user->image);
            }
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('register')->with('deleteSuccess', 'Account deleted Successfully. register new admin from here');
        } else {
            $request->session()->flash('deleteFailed', 'Please enter correct password to delete your account');
            return back();
        }
    }
}
