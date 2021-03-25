@extends('master')
@section('content')

<div class="container custom-product">
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
  @foreach($product as $pro)
    <div class="carousel-item {{$pro['id']==1?'active':''}}">
      <a href="detail/{{$pro['id']}}">
      <img class="d-block w-100 slider" src="{{$pro['gallery']}}" alt="First slide">
      <h1>{{$pro['name']}}</h1>
      </a>
      <!-- <h1>{{$pro['price']}}</h1> -->

    </div>
   @endforeach 
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
 <div class="tranding-wrapper">
   <h1>Tranding Product</h1>
   <div class="">
  @foreach($product as $pro)
    <div class="tranding-item">
    <a href="detail/{{$pro['id']}}">
      <img class="tranding-image" src="{{$pro['gallery']}}">
      <h1>{{$pro['name']}}</h1>
    </a>
    </div>
   @endforeach 
  </div>
 </div>
</div>
@endsection
