@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

{{-- carousel first --}}

  {{-- Banner --}}
  <div class="bg-card text-light d-flex justify-content-center align-items-center mb-4" style="height: calc(40vh - 3rem);">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="col-md-5">
        <h1>{{__('Sneaker Store')}}</h1>
        <h2>Why?</h2>
        <p class="fs-3">{{__('The Best Store')}}</p>

        <h3 class="text-center">{{__('You can buy a Sneaker in')}}</h3>
        <div class="row">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-money-bill fs-5 mb-1 me-2"></i>
            <h3>{{__('Buy')}}</h3>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-magnifying-glass fs-5 mb-1 me-2"></i>
            <h3>{{__('Search')}}</h3>
          </div>
          @guest
            <a href="{{ route('register') }}" class="btn btn-outline-light mt-5">Get Started!</a>
          @else
            <a href="{{ route('category.index') }}" class="btn btn-outline-light mt-5">See all categories</a>
          @endguest
        </div>

      </div>

      <div class="col-md-5">
        <img src="./images/dunk5.png" alt="" style="width: 100%; height: 18vh; object-fit:cover;">
      </div>
    </div>
  </div>

{{-- carrousel --}}

<div id="carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>

  </div>
  <div class="carousel-inner">
    @for ($i = 0; $i < min(count($viewData['latestSneakers']), 5); $i++)
      <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
        <a href="{{ route('sneakers.index', $viewData['latestSneakers'][$i]->getId()) }}">
          <img
            src="{{ URL::to('/') }}/image/sneakers/{{ $viewData['latestSneakers'][$i]->getId() }}/{{ $viewData['latestSneakers'][$i]->getImage() }}"
            style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
        </a>
      </div>
    @endfor
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">{{__'Previous'}}</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">{{__'Next'}}</span>
  </button>
</div>

{{-- latest sneakers and cheapest sneakers --}}
<div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 mt-3 bg-card-sneaker">
      <div class="list-group">
        <h2 class="text-center">{{__'Latest Sneakers'}}</h2>
        @foreach ($viewData['latestSneakers'] as $sneaker)
          <div class="col-md-12 bg-third text-light d-flex p-1">
            <a href="{{ route('sneakers.index', $sneaker->getId()) }}"
              class="list-group-item mb-2 list-group-item-action bg-third text-light">
              <div class="d-flex w-100">
                <img src="{{ URL::to('/') }}/image/sneakers/{{ $sneaker->getId() }}/{{ $sneaker->getImage() }}"
                  class="" alt="..." style="width: 30%; max-height: 8rem" />
                <div class="d-flex flex-column justify-content-center ms-2">
                  <h5 class="mb-1">{{ $sneaker->getName() }}</h5>
                  <p class="mb-1" style="
                                  display: -webkit-box;
                                  -webkit-line-clamp: 2;
                                  -webkit-box-orient: vertical;
                                  overflow: hidden;
                                ">
                    {{ $sneaker->getDescription() }}
                  </p>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
     </div>
    </div>

    <div class="col">
      <div class="p-3 mt-3 bg-card-sneaker">
        <div class="list-group">
          <h2 class="text-center">{{__'Cheapest Sneakers'}}</h2>
          @foreach ($viewData['cheapestSneakers'] as $sneaker)
            <div class="col-md-12 bg-third text-light d-flex p-1">
              <a href="{{ route('sneakers.index', $sneaker->getId()) }}"
                class="list-group-item mb-2 list-group-item-action bg-third text-light">
                <div class="d-flex w-100">
                  <img src="{{ URL::to('/') }}/image/sneakers/{{ $sneaker->getId() }}/{{ $sneaker->getImage() }}"
                    class="" alt="..." style="width: 30%; max-height: 8rem" />
                  <div class="d-flex flex-column justify-content-center ms-2">
                    <h5 class="mb-1">{{ $sneaker->getName() }}</h5>
                    <p class="mb-1" style="
                                    display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;
                                  ">
                      {{ $sneaker->getDescription() }}
                    </p>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

{{-- categories --}}

<div class="row mt-5 mb-5">
  <h5 class="card-title">{{__('Products')}}</h5>
  @foreach ($viewData['categories'] as $category)
    <div class="col-sm-4">
      <div class="card" style="width: 25rem;">
        <img src="{{ URL::to('/') }}/image/category/{{ $category->getImage() }}"
        class="card-img-top" alt="..."  />
        <div class="card-body">
          <h5 class="card-title">{{ $category->getName() }}</h5>
          <p class="card-text">{{ $category->getDescription() }}</p>
          <a href="{{ route('category.show', $category->getId()) }}" class="btn btn-primary">See More</a>
        </div>
      </div>
    </div>
    @endforeach
</div>

  {{-- categories products --}}
  <div class="row mt-5 mb-5">
    <h5 class="card-title">{{__('Random Products')}}</h5>
    <i class="fa fa-home"></i>
    @foreach ($viewData['randomProducts'] as $abarrote)
      <div class="col-sm-4">
        <div class="card" style="width: 25rem;">
          <div class="card-body">
            <h5 class="card-title">{{ $abarrote['name'] }}</h5>
            <p class="card-text">{{ $abarrote['price'] }}</p>
          </div>
        </div>
      </div>
    @endforeach
</div>

{{-- Latest Clothes --}}

<div class="row mt-5 mb-5">
  <h5 class="card-title">{{__('Top buyers')}}</h5>
  @foreach ($viewData['Bestusers'] as $bestuser)
    <div class="col-sm-4">
      <div class="card" style="width: 25rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $bestuser['name'] }}</h5>
        </div>
      </div>
    </div>
    @endforeach
</div>

  {{-- categories products --}}
  <div class="row mt-5 mb-5">
    <h5 class="card-title">{{__('Trending products')}}</h5>
    <i class="fa fa-home"></i>
    @foreach ($viewData['accessories'] as $accessory)
      <div class="col-sm-3" href="{{ route('accessories.index', $accessory->getId()) }}">
        <div class="card" style="width: 18rem;">
          <img src="{{ URL::to('/') }}/image/accessories/{{ $accessory->getId() }}/{{ $accessory->getImage() }}"
            class="card-img-top" alt="..."/>
          <div class="card-body">
            <h5 class="card-title">{{ $accessory->getType() }}{{ $accessory->getBrand() }}</h5>
            <p class="card-text">{{ $accessory->getDescription() }}</p>
            <p class="card-text">{{ $accessory->getPrice() }}</p>
            <a href="#" class="btn btn-primary">See More!</a>
          </div>
        </div>
      </div>
    @endforeach
</div>



{{-- photo carousel --}}

<div id="carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>

  </div>
  <div class="carousel-inner">
    @for ($i = 0; $i < min(count($viewData['accessories']), 5); $i++)
      <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
        <a href="{{ route('sneakers.index', $viewData['accessories'][$i]->getId()) }}">
          <img
            src="{{ URL::to('/') }}/image/accessories/{{ $viewData['accessories'][$i]->getId() }}/{{ $viewData['accessories'][$i]->getImage() }}"
            style="height: 50vh; object-fit: cover" class="d-block w-100" alt="..." />
        </a>
      </div>
    @endfor
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endsection