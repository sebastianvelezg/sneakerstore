@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="d-flex justify-content-around align-items-center" style="height: calc(45vh - 3rem);">
    <div class="container d-flex justify-content-around align-items-center">
      <div class="col-md-5">
        <h1>{{  __('Category')}}</h1>
        <h2>{{ __('How?')}}</h2>
        <p class="fs-3">{{__('In SneakerStore all products are divided in categories so you can choose and search easily any of you rhypebeast needs.')}}</p>

        <div class="row">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-magnifying-glass fs-5 mb-1 me-2"></i>
            <h3>{{__('Search')}}</h3>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-arrow-pointer fs-5 mb-1 me-2"></i>
            <h3>{{__('Enter')}}</h3>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-cart-shopping fs-5 mb-1 me-2"></i>
            <h3>{{__('Buy')}}</h3>
          </div>
        </div>

      </div>

      <div class="col-md-5 mt-2 mb-2">
        <img src="images/store1.png" class="rounded" alt=""  width="533.33" height="300">

      </div>
    </div>
  </div>

  <div class="bg-dark">
    <div class="container rounded" >
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