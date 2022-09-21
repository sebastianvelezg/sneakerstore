@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="d-flex justify-content-around align-items-center bg-primary text-light" style="height: calc(65vh - 3rem);">
    <div class="container d-flex justify-content-around align-items-center">
      <div class="col-md-7">
        <h1 class="text-center">The innovation of a simple design store.</h1><br>
        <p class="fs-3">Our mission is to provide and generate new ways about how to updete yor style.</p>
        <div class="d-flex p-4 space between justify-content-between">
          <p>
            <i class="fa-solid fa-gamepad"></i>
            <span class="fw-bold mx-1">Pruducts sold</span>12.569
          </p>
          <p>
            <i class="fa-solid fa-user"></i>
            <span class="fw-bold mx-1">Sneaker requested </span>3.242
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <img src="./images/store2.jpg" alt="" style="width: 100%; height: 28vh; object-fit:cover ">
    </div>
    <div class="col-md-1">
    </div>
  </div>
  </div>
  <div class="d-flex justify-content-around align-items-center mb-5 mt-5">
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <h1 class="text-center">Buying on our store </h1><br>
            <p class="fs-3">Every items sold through our store goes to step by step verification process to ensure 100% legitimate items.</p>
            <div class="d-flex p-4 justify-content-center">
            <p>
                <i class="fa-solid fa-people-group"></i>
                <span class="fw-bold mx-1">Authentic</span>100%
            </p>
            </div>

            <div class="d-flex justify-content-center align-items-center">
            <a href="{{ route('register') }}" class="btn btn-outline-dark">Get started <i
                class="fa-solid fa-right-long"></i></a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="https://media.blackandwhite-ff.com/10000/f82356f3-6417-43d7-a72b-22f473e6532f_top-hero.jpg"
            style="width: 100%; height: 23vh; object-fit:cover;" alt="">
        </div>
        </div>
    </div>
    </div>
  <div class="bg-dark text-light w-100">
    <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
      <div class="col-md-8 row my-5">
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-people-group fs-1"></i>
          <h3>100% original</h3>
          <p class="">The products that we sell have the stamp of quality and verification.</p><br>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-plus fs-1"></i>
          <h3>Secure</h3>
          <p class="">We preserve the integrity of our clients, and handle the information they provide us in an ethical and responsible manner.</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-leaf fs-1"></i>
          <h3>Best resell price</h3>
          <p class="">We know the prices and tendencies of our products, for that reason we have the best resell price in the market.</p>
        </div>
      </div>

      <div class="col-md-8 row my-5">
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-ranking-star fs-1"></i>
          <h3>The best attention</h3>
          <p class="">We are always avaliable to answer any question that our clients have, with the best attitude.</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-star fs-1"></i>
          <h3>Fast an easy shipping</h3>
          <p class="">We work with TCC, that posibility increase the efecivity of our shipping system.</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-face-laugh-beam fs-1"></i>
          <h3 class="text-center">Store coming soon...</h3>
          <p class="">We planning to open our store in medellin</p><br>
        </div>
      </div>
    </div>
  </div>
  @Endsection



