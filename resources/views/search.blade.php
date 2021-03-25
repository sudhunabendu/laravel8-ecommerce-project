@extends('master')
@section('content')

<div class="container custom-product">
  <div class="col-sm-4">
    <a href="#">Filter</a>
  </div>
  <div class="col-sm-10">
  <div class="tranding-wrapper">
 <div class="search-item">
   <h4>Result for  Product</h4>
   <div class="">
  @foreach($product as $pro)
    <div class="tranding-item">
    <a href="detail/{{$pro['id']}}">
      <img class="tranding-image" src="{{$pro['gallery']}}">
      <h2>{{$pro['name']}}</h2>
      <h5>{{$pro['description']}}</h5>
    </a>
    </div>
   @endforeach 
  </div>
 </div>
 </div>
  </div>
</div>
@endsection
