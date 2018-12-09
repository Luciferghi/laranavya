<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Order;
use App\OrderProduct;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newSubTotal = $this->getNumbers()->get('newSubTotal');
        return view('checkout')->withnewSubTotal($newSubTotal);
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
        
        $order = $this->addToOrdersTable($request,null);
        
        Mail::send(new OrderPlaced($order));

        Cart::clear();
        session()->forget('coupon');
        return redirect()->route('confirmation.index')->with('success_message','Success Message');
    }

    public function addToOrdersTable($request)
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'billing_country' => $request->country,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_phone' => $request->phone_number,
            
            
            'billing_email' => $request->email_address,
            'billing_discount' => $this->getNumbers()->get('discount'),
            'billing_discount_code' => $this->getNumbers()->get('code'),
            'billing_subtotal' => $this->getNumbers()->get('newSubTotal'),
            'billing_total' => $this->getNumbers()->get('newSubTotal'),
        ]);
        
        foreach (Cart::getContent() as $item) {
            
            OrderProduct::create([

                'order_id' => $order->id,
                'product_id' => $item->attributes->id,
                'quantity' => $item->quantity,



            ]);
        }
        return $order;
        
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getNumbers()
    {
        $subTotal = Cart::getSubtotal();
        $discount = session()->get('coupon')['discount'] ?? 0;
        $newSubTotal = $subTotal - $discount;
        $code = session()->get('coupon')['name'] ?? null;
        return collect([
            'subTotal' => $subTotal,
            'discount' => $discount,
            'newSubTotal' => $newSubTotal,
            'code' => $code,
        ]);
    }
}
