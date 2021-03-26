@extends('master')
@section('content')

<div class="container custom-product">
  <div class="col-sm-10">
  <div class="tranding-wrapper">
 <div class="search-item">
   <h4>Cart List</h4>
   <a class="btn btn-success" href="/ordernow">Order Now</a><br><br>
   <div class="">
  @foreach($product as $pro)
    <div class="tranding-item">
    <div class="col-sm-3">
      <a href="detail/{{$pro->id}}">
        <img class="tranding-image" src="{{$pro->gallery}}">
    </a>
    </div>
    <div class="col-sm-3">
        <div class="">
        <h2>{{$pro->name}}</h2>
        <h5>{{$pro->description}}</h5>
        </div>
    </div>
    <div class="col-sm-3">
     <a href="removecart/{{$pro->cart_id}}" class="btn btn-warning">Remove From Cart</a><br><br>
    </div>
    </div>
   @endforeach 
   
  </div>
 </div>
 </div>
  </div>
</div>
@endsection
