<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

$total = 0;
if(Session::has('user')){
  $total = ProductController::cartItem();
}



?>
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="/">ECOM</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#">Orders <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#">Signup <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item ">
        <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item ">
        <a class="nav-link" href="/cartlist">CartItem ({{$total}})<span class="sr-only">(current)</span></a>
      </li>
      @if(Session::has('user'))
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       {{Session::get('user')['name']}}
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/logout">Logout</a>
      </div>
    </li>
    @else
    <li class="nav-item ">
        <a class="nav-link" href="/login">Login<span class="sr-only">(current)</span></a>
      </li>
    @endif
    </ul>
    <form action="/search" class="form-inline my-2 my-lg-0"> 
      <input class="form-control mr-sm-2 search" type="search" name="query" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>