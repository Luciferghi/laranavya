<!DOCTYPE html>
<html lang="en">
<head>
@include('partials.header')

<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<!-- Header desktop -->
		@include('partials.nav')
			</header>

@if(session()->has('success_message'))
<div class="d-flex justify-content-center">
    <div class="alert alert-success" role="alert">
        {{session()->get('success_message')}}
    </div>
    </div>



@endif
@if(session()->has('error_message'))
<div class="d-flex justify-content-center">
    <div class="alert alert-danger">
        {{session()->get('error_message')}}
    </div>
    </div>



@endif
<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <div style="display: table; margin: auto;">
                        <span class="step step_complete"> <a href="/cart" class="check-bc">Cart</a> <span class="step_line step_complete"> </span> <span class="step_line backline"> </span> </span>
                        <span class="step step_complete"> <a href="#" class="check-bc">Checkout</a> <span class="step_line "> </span> <span class="step_line step_complete"> </span> </span>
                        <span class="step_thankyou check-bc step_complete">Thank you</span>
                    </div>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><small><a class="afix-1" href="#">Edit Cart</a></small></div>
                        </div>
                        <div class="panel-body">
                        	@foreach(Cart::getContent() as $item)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="{{ productImage($item->attributes->image) }}"/>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12">{{ $item->name }}</div>
                                    <div class="col-xs-12"><small>Quantity:<span>{{ $item->quantity }}</span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6><span>RS </span>{{ $item->price }}</h6>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>RS </span><span>{{ Cart::getSubtotal() }}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <small>Shipping</small>
                                    <div class="pull-right"><span>-</span></div>
                                </div>
                                @if(session()->has('coupon'))
                                <div class="col-xs-12">
                                    <small>Discount({{session()->get('coupon')['name']}}): 
                                    <form action="{{ route('coupon.destroy') }}" method="POST" style="display: inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    
                                    <button type="submit" style="font-size: 10px;">Remove</button>
                                    </form></small>
                                    <div class="pull-right"><span>RS {{ session()->get('coupon')['discount'] }}</span></div>
                                </div>
                                <hr>
                                <div class="col-xs-12">
                                    <strong><br>New Subtotal</strong>
                                    <div class="pull-right"><span>RS </span><span>{{ $newSubTotal }}</span></div>
                                </div>

                                @endif
                                

                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong><br>Order Total</strong>
                                    <div class="pull-right"><span>RS </span><span>{{ $newSubTotal }}</span>
                                    </div>
                                                                                
                                </div>
                             @if(!session()->has('coupon'))
                
                                <form action="{{ route('coupon.store')}}" method="POST" style="display: inline;">
                                {{@csrf_field()}}

                                <div class="col-md-6 col-xs-12">
                                    <strong><br>Coupon Code:</strong>
                                    <input type="text" name="coupon_code" class="form-control" required />
                                    <br>
                                    <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Apply Coupon</button>
                                </div>
                                </form>
                            @endif
                                </div>

                        </div>
                    </div>
                
                    <!--REVIEW ORDER END-->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <form class="form-horizontal" action="{{ route('checkout.store') }}" method="POST" >
                            {{ @csrf_field() }}
                            <div class="form-group">
                                <div class="col-md-12"><strong>Country:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="country"  required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Name:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" required />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Address:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="address" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>City:</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="city" class="form-control" required />
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input type="text" name="phone_number" class="form-control" required /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="text" name="email_address" class="form-control" value="{{ auth()->user()->email }}" readonly /></div><br><br>
                                <div class="col-md-6 col-xs-12">
                                <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Place Order</button></div>
                            
                            </div>
                            

                        </div>

                    </div>
                </form>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->

                            
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>

@include('partials.footer')