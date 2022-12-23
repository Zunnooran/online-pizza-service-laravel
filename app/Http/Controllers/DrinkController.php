<?php

namespace App\Http\Controllers;

use App\Models\drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = drink::all();
    
        return view('admin.drinks.index_drink',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.drinks.create_drink');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        drink::create($input);
     
        return redirect()->route('drinks.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function show(drink $drink)
    {   
     
        
        return view('admin.drinks.show_drink',compact('drink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function edit(drink $drink)
    {
        return view('admin.drinks.edit_drink',compact('drink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, drink $drink)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $drink->update($input);
    
        return redirect()->route('drinks.index')
                        ->with('success',' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\drink  $drink
     * @return \Illuminate\Http\Response
     */
    public function destroy(drink $drink)
    {
        
        $drink->delete();
        return redirect()->route('drinks.index')
                        ->with('success',' deleted successfully');
    }
}
