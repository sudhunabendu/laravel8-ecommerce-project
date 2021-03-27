@extends('master')
@section('content')

<div class="container custom-product">
  <div class="col-sm-10">
  <div class="tranding-wrapper">
 <div class="search-item">
   <h4>My Orders List</h4>
   <div class="">
  @foreach($total as $pro)
    <div class="tranding-item">
    <div class="col-sm-3">
      <a href="detail/{{$pro->id}}">
        <img class="tranding-image" src="{{$pro->gallery}}">
    </a>
    </div>
    <div class="col-sm-3">
        <div class="">
        <h2>Name :{{$pro->name}}</h2>
        <h5>Delevery Status :{{$pro->status}}</h5>
        <h5>Address:{{$pro->address}}</h5>
        <h5>Payment Status:{{$pro->payment_status}}</h5>
        <h5>Payment Method:{{$pro->payment}}</h5>

        </div>
    </div>
    <div class="col-sm-3">
    </div>
    </div>
   @endforeach 
   
  </div>
 </div>
 </div>
  </div>
</div>
@endsection
