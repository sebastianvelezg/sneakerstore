@extends("layouts.app") @section('title', $viewData['title'])
@section('content')

<div class="container pt-5">
    <h1 class="text-center">{{ $viewData['category']->getName() }}</h1>
        <h3 class="text-center my-5">New accessories</h3>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        @for ($i = 0; $i < min(count($viewData['accessories']), 3); $i++)
          <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            <a href="{{ route('accessories.index', $viewData['accessories'][$i]->getId()) }}">
              <img
                src="{{ URL::to('/') }}/image/accessories/{{ $viewData['accessories'][$i]->getId() }}/{{ $viewData['accessories'][$i]->getImage() }}"
                style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
            </a>
          </div>
        @endfor
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <h3 class="text-center my-5">Highlights</h3>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        @for ($i = 0; $i < min(count($viewData['accessories']), 6); $i += 2)
          <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
            @if ($i + 1 < count($viewData['accessories']))
              <div class="d-flex">
                <a href="{{ route('accessories.index', $viewData['accessories'][$i]->getId()) }}">
                  <img
                    src="{{ URL::to('/') }}/image/accessories/{{ $viewData['accessories'][$i]->getId() }}/{{ $viewData['accessories'][$i]->getImage() }}"
                    style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
                </a>
                <a href="{{ route('accessories.index', $viewData['accessories'][$i + 1]->getId()) }}">
                  <img
                    src="{{ URL::to('/') }}/image/accessories/{{ $viewData['accessories'][$i + 1]->getId() }}/{{ $viewData['accessories'][$i + 1]->getImage() }}"
                    style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
                </a>
              </div>
            @else
              <a href="{{ route('accessories.index', $viewData['accessories'][$i]->getId()) }}">
                <img
                  src="{{ URL::to('/') }}/image/accessories/{{ $viewData['accessories'][$i]->getId() }}/{{ $viewData['accessories'][$i]->getImage() }}"
                  style="width: 100%; height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
              </a>
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

    <div class="row">
      <h2 class="text-center my-5">{{ $viewData['category']->getName() }}</h2>

      <div class="row d-flex justify-content-around">
        @foreach ($viewData['accessories'] as $accessory)
          <div class="col-md-5 bg-dark text-light d-flex mb-2">
            <a href="{{ route('accessories.index', $accessory->getId()) }}"
              class="list-group-item mb-2 list-group-item-action bg-dark text-light">
              <div class="d-flex w-100 justify-content-between">
                <img src="{{ URL::to('/') }}/image/accessories/{{ $accessory->getId() }}/{{ $accessory->getImage() }}"
                  class="" alt="..." style="width: 30%; max-height: 8rem" />
                <div class="d-flex flex-column justify-content-center ms-2">
                  <h5 class="mb-1">{{ $accessory->getType() }} {{ $accessory->getBrand() }}</h5>
                  <p class="mb-1" style="
                                  display: -webkit-box;
                                  -webkit-line-clamp: 2;
                                  -webkit-box-orient: vertical;
                                  overflow: hidden;
                                ">
                    {{ $accessory->getDescription() }}
                  </p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  
@endsection