<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->get();
        return view('backend.pages.contact.manage', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $contact = new Contact();
        $contact->phone=$request->phone;
        $contact->address=$request->address;
        $contact->facebook=$request->facebook;
        $contact->youtube=$request->youtube;

        $contact->save();
        Toastr::success('Contact Created');

        return redirect()->route('contactShow');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function update(Contact $contact, Request $request)
    {
        $contact->phone=$request->phone;
        $contact->address=$request->address;
        $contact->facebook=$request->facebook;
        $contact->youtube=$request->youtube;

        $contact->save();
        Toastr::success('Contact Updated');

        return redirect()->route('contactShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        Toastr::error('Contact Deleted');

        return redirect()->route('contactShow');
    }
}
