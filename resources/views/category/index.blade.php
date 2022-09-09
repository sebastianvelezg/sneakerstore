@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="d-flex justify-content-around align-items-center" style="height: calc(100vh - 3rem);">
    <div class="container d-flex justify-content-around align-items-center">
      <div class="col-md-5">
        <h1>Category</h1>
        <h2>How?</h2>
        <p class="fs-3">In game store the games are separated by categories, so it is easier to find what you are looking for or find other games related to the ones you like.</p>

        <div class="row">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-magnifying-glass fs-5 mb-1 me-2"></i>
            <h3>Search</h3>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-arrow-pointer fs-5 mb-1 me-2"></i>
            <h3>Enter</h3>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-cart-shopping fs-5 mb-1 me-2"></i>
            <h3>Buy</h3>
          </div>
        </div>

      </div>

      <div class="col-md-5">
        <img src="/images/dunk5.png" alt="">
      </div>
    </div>
  </div>

  <div class="bg-dark">
    <div class="container">
      <div class="row">
        @foreach ($viewData['categories'] as $category)
          <div class="col-md-3">
            <div class="card my-4">
              <img src="{{ URL::to('/') }}/image/category/{{ $category->getImage() }}" class="card-img-top"
                alt="..." style="height: 15rem; object-fit:cover;">
              <div class="card-body d-flex flex-column justify-content-center">
                <a href="{{ route('category.show', $category->getId()) }}"
                  class="btn btn-dark">{{ $category->getName() }}</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection