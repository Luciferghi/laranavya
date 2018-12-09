<style type="text/css">
  body,
  html, 
  .body {
    background: #f3f3f3 !important;
  }
</style>
<!-- move the above styles into your custom stylesheet -->

<spacer size="16"></spacer>

<container>

  <spacer size="16"></spacer>

  <row>
    <columns>
      <h1>Thanks for your order.</h1>
      <p>Thanks for shopping with us! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad earum ducimus, non, eveniet neque dolores voluptas architecto sed, voluptatibus aut dolorem odio. Cupiditate a recusandae, illum cum voluptatum modi nostrum.</p>

      <spacer size="16"></spacer>

      <callout class="secondary">
        <row>
          <columns large="6">
            <p>
              <strong>Payment Method</strong><br/>
              Cash On Delivery
            </p>
            <p>
              <strong>Email Address</strong><br/>
              {{$order->billing_email}}
            </p>
            <p>
              <strong>Order ID</strong><br/>
              {{ $order->id }}
            </p>
          </columns>
          <columns large="6">
            <p>
              <strong>Shipping Method</strong><br/>
              Bike<br/>
              <strong>Shipping Address</strong><br/>
              {{ $order->billing_address }},{{ $order->billing_city }},{{ $order->billing_country }}
            </p>
          </columns>
        </row>
      </callout>

      <h4>Order Details</h4>

      <table>
        <tr><th>Item</th><th>#</th><th>Price</th></tr>
        @foreach (Cart::getContent() as $product)
         
        
        <tr><td>{{ $product->name }}</td><td>{{ $product->quantity }}</td><td>{{ $product->price }}</td></tr>
        @endforeach
        <tr>
          <td colspan="2"><b>Subtotal:</b></td>
          <td>{{ $order->billing_total }}</td>
        </tr>
      </table>

      <hr/>

      <h4>What's Next?</h4>

      <p>Our carrier raven will prepare your order for delivery. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi necessitatibus itaque debitis laudantium doloribus quasi nostrum distinctio suscipit, magni soluta eius animi voluptatem qui velit eligendi quam praesentium provident culpa?</p>
    </columns>
  </row>
  <row class="footer text-center">
    <columns large="3">
      <img src="http://placehold.it/170x30" alt="">
    </columns>
    <columns large="3">
      <p>
        Call us at 800.555.1923<br/>
        Email us at support@discount.boat
      </p>
    </columns>
    <columns large="3">
      <p>
        123 Maple Rd<br/>
        Campbell, CA 95112
      </p>
    </columns>
  </row>
</container>