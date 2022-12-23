<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use App\Models\cart;
use App\Models\drink;
use App\Models\deal;
use App\Models\pizza;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=cart::all();
        return view('cart.show-cart',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_pizza($id)
    {
        $data=new cart();
        $data_pizza=pizza::find($id);

        
        $data->name=$data_pizza->name;
        $data->price=$data_pizza->price;
        $data->quantity=1;
        $data->save();

        return redirect()->route('home')->with('status','Added to cart');

    }
    public function create_deal($id)
    {
        $data=new cart();
        $data_deal=deal::find($id);
        
        $data->name=$data_deal->name;
        $data->price=$data_deal->price;
        $data->quantity=1;
        $data->save();
        
        return redirect()->route('home')->with('status','Added to cart');

    }
    public function create_drink($id)
    {
        $data=new cart();

        $data_drink=drink::find($id);
 
        $data->name=$data_drink->name;
        $data->price=$data_drink->price;
        $data->quantity=1;
        $data->save();

        return redirect()->route('home')->with('status','Added to cart');
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
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(cart $cart)
    {
        //
    }
    public function payment(){
        cart::truncate();
        return Redirect()->route('home');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cart::destroy($id);
        return Redirect(route('cart.index'))->with('status','Deleted succesfully');
    }
    
}
