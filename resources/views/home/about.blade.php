@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="d-flex justify-content-around align-items-center" style="height: calc(100vh - 3rem);">
    <div class="container d-flex justify-content-around align-items-center">
      <div class="col-md-6">
        <h1 class="text-center">'The Sneakers lovers mas chimbas.'</h1>
        <p class="fs-3">'Our mission is to provide and generate new ways about how to updete yor style.'</p>
        <div class="d-flex p-4 space between justify-content-between">
          <p>
            <i class="fa-solid fa-gamepad"></i>
            <span class="fw-bold mx-1">@lang('messages.quantity')</span>13.450
          </p>
          <p>
            <i class="fa-solid fa-user"></i>
            <span class="fw-bold mx-1">@lang('messages.quantity')</span>1.245
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <img src="./images/dunk2.png" alt="">
    </div>
  </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="text-center">@lang('messages.subtitleAboutCommunity')</h1>
        <p class="fs-3">@lang('messages.subdescriptionAboutCommunity')</p>
        <div class="d-flex p-4 justify-content-center">
          <p>
            <i class="fa-solid fa-people-group"></i>
            <span class="fw-bold mx-1">@lang('messages.quantity')</span>13.450
          </p>
        </div>

        <div class="d-flex justify-content-center align-items-center">
          <a href="{{ route('register') }}" class="btn btn-outline-dark">@lang('messages.getStarted') <i
              class="fa-solid fa-right-long"></i></a>
        </div>
      </div>
      <div class="col-md-6">
        <img src="https://media.blackandwhite-ff.com/10000/f82356f3-6417-43d7-a72b-22f473e6532f_top-hero.jpg"
          style="width: 100%; height: 23vh; object-fit:cover;" alt="">
      </div>
    </div>
  </div>

  <div class="bg-dark text-light w-100">
    <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
      <div class="col-md-6">
        <h3 class="text-center">@lang('messages.features')</h3>
        <p class="fs-5">@lang('messages.featuresDescription')</p>
      </div>

      <div class="col-md-8 row my-5">
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-people-group fs-1"></i>
          <h3>@lang('messages.community')</h3>
          <p class="">@lang('messages.communityDescription')</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-plus fs-1"></i>
          <h3>@lang('messages.variety')</h3>
          <p class="">@lang('messages.varietyDescription')</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-leaf fs-1"></i>
          <h3>@lang('messages.easiness')</h3>
          <p class="">@lang('messages.easinessDescription')</p>
        </div>
      </div>

      <div class="col-md-8 row my-5">
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-ranking-star fs-1"></i>
          <h3>@lang('messages.deafultAcces')</h3>
          <p class="">@lang('messages.defaultAccesSescription')</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-star fs-1"></i>
          <h3>@lang('messages.status')</h3>
          <p class="">@lang('messages.statusDescription')</p>
        </div>
        <div class="col-md-4 d-flex flex-column justify-content-center align-items-center">
          <i class="fa-solid fa-face-laugh-beam fs-1"></i>
          <h3 class="text-center">@lang('messages.experience')</h3>
          <p class="">@lang('messages.experienceDescription')</p>
        </div>
      </div>
    </div>
  </div>
@endsection