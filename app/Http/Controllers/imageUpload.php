<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizza;

class imageUpload extends Controller
{     

    public function index()
    {
        $info=pizza::all();
        return view('admin.a_pizza',['info'=>$info]);
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('admin.add-pizza');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    
           ]);     
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
    
        //    dd($request->$imageName);
    
           $save = new pizza();
           $save->name = $request->name;
           $save->price=$request->price;
           $save->image = $imageName;
           $save->save();
    
           return redirect()->route('a.pizza')->with('status', 'Data Sucessfully Uploaded');
    
       }
       /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit =pizza::find($id);

        return view('admin.edit-pizza',['edit'=>$edit]);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);     
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
    
        $update=pizza::find($id);
        $update->name = $request->name;
        $update->price = $request->price;
        $update->image = $imageName;
        $update->save();
 
        return Redirect(route('a.pizza'))->with('status','Updated succesfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show =pizza::find($id);

        return view('admin.show-pizza',['show'=>$show]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       pizza::destroy($id);
       return Redirect(route('a.pizza'))->with('status','Deleted succesfully');
    }
   }
   
    

