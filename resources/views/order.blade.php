@extends('master')
@section('content')

<div class="custom-product">
  <div class="col-sm-6"><br><br>
  <table class="table">
    <tbody>
      <tr>
        <td>Total Price:-</td>
        <td>&#8377; &nbsp;{{$total}}</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>0 Rupees</td>
      </tr>
      <tr>
        <td>Delevery</td>
        <td>&#8377; &nbsp;100</td>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td>{{$total+100}}</td>
      </tr>
    </tbody>
  </table>

  <form action="orderplace" method="POST">
  @csrf
  <div class="form-group">
    <textarea placeholder="enter your address" name="address" class="form-control"></textarea>
  </div>
  <div class="form-group">
  <label for="">Payment Method</label>

  <p><input type="radio" value="online" name="payment"><span>&nbsp;&nbsp;Online payment</span></p>
  <p><input type="radio" value="cod" name="payment"><span>&nbsp;&nbsp;Cash On Delevery</span></p>
  <p><input type="radio" value="upi" name="payment"><span>&nbsp;&nbsp;UPI Payment</span></p>
  
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Order Now</button>
</form>
  </div>
</div>
@endsection
