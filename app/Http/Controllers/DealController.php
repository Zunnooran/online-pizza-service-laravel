<?php

namespace App\Http\Controllers;

use App\Models\deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = deal::all();
    
        return view('admin.deals.index_deal',compact('info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deals.create_deal');
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
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
        deal::create($input);
     
        return redirect()->route('deals.index')
                        ->with('success',' created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(deal $deal)
    {   
     
        
        return view('admin.deals.show_deal',compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(deal $deal)
    {
        return view('admin.deals.edit_deal',compact('deal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deal $deal)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description'=>'required',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $deal->update($input);
    
        return redirect()->route('deals.index')
                        ->with('success',' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(deal $deal)
    {
        
        $deal->delete();
        return redirect()->route('deals.index')
                        ->with('success',' deleted successfully');
    }
}
