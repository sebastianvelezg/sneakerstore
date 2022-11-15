@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

  <div class="bg-dark text-light" style="min-height: 100vh;">
    <div class="container pt-5">
      <div class="row">
        

        <!-- Buttons -->
        <div class="mb-3" role="group" aria-label="Basic example">
          <a href="{{ route('cart.checkOut') }}" class="btn btn-outline-light">Checkout</a>
          <a href="{{ route('cart.removeAll') }}" class="btn btn-outline-light">Remove</a>
        </div>

        <!-- All items -->
        <div class="d-flex flex-wrap justify-content-around">

          @foreach ($viewData['sneakers'] as $sneaker)
            <div class="card m-1 bg-dark border border-light" style="width: 30%;">
              <div class="card-body">
                <h5 class="card-title">{{ $sneaker->getName() }}</h5>
                <img src="./../../image/sneakers/{{ $sneaker->getId() }}/{{ $sneaker->getImage() }}" alt=""
                  style="width: 100%; max-height: 10rem;">
                <!-- <a href="{{ route('cart.remove', $sneaker->getId()) }}" class="btn btn-outline-light mt-3"></a> -->
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
@endsection
