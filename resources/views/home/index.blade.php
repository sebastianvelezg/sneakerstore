@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

{{-- carousel first --}}

  {{-- Banner --}}
  <div class="bg-card text-light d-flex justify-content-center align-items-center mb-4" style="height: calc(40vh - 3rem);">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="col-md-5">
        <h1>Sneaker Store</h1>
        <h2>Why?</h2>
        <p class="fs-3">The best store</p>

        <h3 class="text-center">you can buy sneaker in</h3>
        <div class="row">
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-money-bill fs-5 mb-1 me-2"></i>
            <h3>buy</h3>
          </div>
          <div class="col-md-4 d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-magnifying-glass fs-5 mb-1 me-2"></i>
            <h3>Search</h3>
          </div>
          @guest
            <a href="{{ route('register') }}" class="btn btn-outline-light mt-5">Get Started!</a>
          @else
            <a href="{{ route('category.index') }}" class="btn btn-outline-light mt-5">See All Categories</a>
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
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

{{-- latest sneakers and cheapest sneakers --}}
<div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div class="p-3 mt-3 bg-card-sneaker">
      <div class="list-group">
        <h2 class="text-center">Latest Sneakers</h2>
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
          <h2 class="text-center">Cheapest Sneakers</h2>
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
  <h5 class="card-title">Products</h5>
  @foreach ($viewData['categories'] as $category)
    <div class="col-sm-4">
      <div class="card" style="width: 25rem;">
        <img src="{{ URL::to('/') }}/image/category/{{ $category->getImage() }}"
        class="card-img-top" alt="..."  />
        <div class="card-body">
          <h5 class="card-title">{{ $category->getName() }}</h5>
          <p class="card-text">{{ $category->getDescription() }}</p>
          <a href="{{ route('category.show', $category->getId()) }}" class="btn btn-primary">See More!</a>
        </div>
      </div>
    </div>
    @endforeach
</div>

  {{-- categories products --}}
  <div class="row mt-5 mb-5">
    <h5 class="card-title">Trending Sneakers</h5>
    <i class="fa fa-home"></i>
    @foreach ($viewData['randomProducts'] as $sneaker)
      <div class="col-sm-3" href="{{ route('sneakers.index', $sneaker->getId()) }}">
        <div class="card" style="width: 18rem;">
          <img src="{{ URL::to('/') }}/image/sneakers/{{ $sneaker->getId() }}/{{ $sneaker->getImage() }}"
            class="card-img-top" alt="..."/>
          <div class="card-body">
            <h5 class="card-title">{{ $sneaker->getName() }}{{ $sneaker->getColorway() }}</h5>
            <p class="card-text">{{ $sneaker->getDescription() }}</p>
            <p class="card-text">{{ $sneaker->getPrice() }}</p>
            <a href="#" class="btn btn-primary">See More!</a>
          </div>
        </div>
      </div>
    @endforeach
</div>



{{-- popular brands --}}

<div class="row mt-5 mb-5">
  <h5 class="card-title">Popular Brands</h5>
<div class="col-sm-4">
  <div class="card" style="width: 25rem;">
    <img src="/images/dunk2.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 25rem;">
    <img src="/images/dunk3.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<div class="col-sm-4">
  <div class="card" style="width: 25rem;">
    <img src="/images/dunk4.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
</div>

{{-- brand products --}}

<div class="row mt-5 mb-5">
  <h5 class="card-title">Featured Products</h5>
<div class="col-sm-3">
  <div class="card" style="width: 18rem;">
    <img src="/images/dunk2.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="card" style="width: 18rem;">
    <img src="/images/dunk3.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="card" style="width: 18rem;">
    <img src="/images/dunk4.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<div class="col-sm-3">
  <div class="card" style="width: 18rem;">
    <img src="/images/dunk5.png" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
</div>

{{-- photo carousel --}}

<div id="carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="/images/dunk4.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="/images/dunk2.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>

    <div class="carousel-item">
      <img src="/images/dunk3.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      </div>
    </div>
  </div>

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