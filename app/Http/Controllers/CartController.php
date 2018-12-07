<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;

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
        
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => array(
               'slug' => $request->slug,
                'image' => $request->image,
              )
            
        ));
        
        
        return back()->with('success_message', 'Item was added to the cart!');
    }

    public function clear(){
        Cart::clear();
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
    public function addupdate(Request $request, $id)
    {

        Cart::update($id, array(
        'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return back()->with('success_message', 'Item was updated to the cart!');
    }
    public function subupdate(Request $request, $id)
    {

        Cart::update($id, array(
        'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        return back()->with('success_message', 'Item was updated to the cart!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message','Item has been successfully removed');
    }
}
