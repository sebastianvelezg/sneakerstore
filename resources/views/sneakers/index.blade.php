@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="bg-dark text-light pt-5">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 3rem)">
        <div class="col-md-6">
          <h1 class="text-center">{{ $viewData['sneaker']->getName() }}</h1>
          <p class="card-text">{{ $viewData['sneaker']->getDescription() }}</p>

          <ul class="list-group list-group-flush rounded">
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-user"></i>
                <span class="font-weight-bold">@lang('messages.sneakerDeveloper'): </span>
                {{ $viewData['sneaker']->getColorway() }}
              </p>
              <p class="w-100">
                <i class="fas fa-tag"></i>
                <span class="font-weight-bold">@lang('messages.sneakerName'): </span>
                {{ $viewData['category']->getName() }}
              </p>
            </li>
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-dollar-sign"></i>
                <span class="font-weight-bold">@lang('messages.sneakerPrice'): </span>
                {{ $viewData['sneaker']->getBrand() }}
              </p>
              <p class="w-100">
                <i class="fas fa-id-badge"></i>
                <span class="font-weight-bold">@lang('messages.sneakerAgeRating'): </span>
                {{ $viewData['sneaker']->getReleasedate() }}
              </p>
            </li>
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-abacus"></i>
                <span class="font-weight-bold">@lang('messages.sneakerBuyQuantity'): </span>
                {{ $viewData['sneaker']->getRetailprice() }}
              </p>
              <p class="w-100">
                <i class="fas fa-calendar-plus"></i>
                <span class="font-weight-bold">@lang('messages.sneakerRealeaseDate'): </span>
                {{ $viewData['sneaker']->getprice() }}
              </p>
            </li>
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-calendar"></i>
                <span class="font-weight-bold">@lang('messages.sneakerDateUpdated'): </span>
                {{ $viewData['sneaker']->getUpdateAt() }}
              </p>
              <p class="w-100">
                <i class="fas fa-calendar-check"></i>
                <span class="font-weight-bold">@lang('messages.sneakerDateCreated'): </span>
                {{ $viewData['sneaker']->getCreateAt() }}
              </p>
            </li>
          </ul>
        </div>
        <div class="col-md-6">
          <img
            src="{{ URL::to('/') }}/image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $viewData['sneaker']->getImage() }}"
            class="card-img-top" alt="..." style="max-height: 80vh; object-fit:cover;" ; />
        </div>
      </div>
    </div>
  </div>

  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      @for ($i = 0; $i < count($viewData['images']); $i += 2)
        <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
          @if ($i + 1 < count($viewData['images']))
            <div class="d-flex">
              <img
                src="{{ URL::to('/') }}/image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $viewData['images'][$i]->getFilename() }}"
                style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
              <img
                src="{{ URL::to('/') }}/image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $viewData['images'][$i + 1]->getFilename() }}"
                style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
            </div>
          @else
            <img
              src="{{ URL::to('/') }}/image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $viewData['images'][$i]->getFilename() }}"
              style="width: 100%; height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
          @endif
        </div>
      @endfor
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @endsection