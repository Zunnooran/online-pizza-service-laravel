<?php

namespace App\Http\Controllers;
use App\Models\contact_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // validation on inputs
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'text'=> ['required','alpha_num'],
        ]);
        $request->flashExcept('token');

        // to pass data to view
        // $input=$request->except('_token');
        //  ['data'=> $input]

        // passing data to databasa
        $contact= new contact_us;
        $contact->Name = $request->name;
        $contact->Email = $request->email;
        $contact->Text = $request->text;
        $contact->save();
        return Redirect(route('contact'))->with('status','Submitted succesfully'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {       
        $info=contact_us::all();
        return view('contact_read',['info'=>$info]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit =contact_us::find($id);

        return view('contact_edit',['edit'=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'text'=> ['required','alpha_num'],
        ]);
        $update=contact_us::find($id);
        $update->Name = $request->name;
        $update->Email = $request->email;
        $update->Text = $request->text;
        $update->save();
        return Redirect(route('contact'))->with('status','Updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       contact_us::destroy($id);
       return Redirect(route('contact'))->with('status','Deleted succesfully');
    }
}
