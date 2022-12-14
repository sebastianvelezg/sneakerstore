@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')


<div class="bg-dark text-light pt-5">
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center" style="min-height: calc(40vh - 3rem)">
      <div class="col-md-6">
        <h1 class="text-center">{{ $viewData['sneaker']->getName()}} {{ $viewData['sneaker']->getColorway() }}</h1>

          <ul class="list-group list-group-flush rounded">
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-user"></i>
                <span class="font-weight-bold">Name: </span>
                {{ $viewData['sneaker']->getName() }}
              </p>
              <p class="w-100">
                <i class="fas fa-tag"></i>
                <span class="font-weight-bold">Brand: </span>
                {{ $viewData['sneaker']->getBrand() }}
              </p>
            </li>
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-dollar-sign"></i>
                <span class="font-weight-bold">Colorway:</span>
                {{ $viewData['sneaker']->getColorway() }}
              </p>
              <p class="w-100">
                <i class="fas fa-id-badge"></i>
                <span class="font-weight-bold">Release Date:</span>
                {{ $viewData['sneaker']->getReleasedate() }}
              </p>
            </li>
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-abacus"></i>
                <span class="font-weight-bold">Retail Price: </span>
                {{ $viewData['sneaker']->getRetailprice() }}
              </p>
              <p class="w-100">
                <i class="fas fa-calendar-plus"></i>
                <span class="font-weight-bold">Price: </span>
                {{ $viewData['sneaker']->getprice() }}
              </p>
            </li>
            <li class="list-group-item d-flex bg-dark text-light">
              <p class="w-100">
                <i class="fas fa-calendar"></i>
                <span class="font-weight-bold">Description:</span>
                {{ $viewData['sneaker']->getDescription() }}
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

  <div id="carousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="bg-dark text-light py-5">
    <div class="container">
      <div class="d-flex justify-content-center align-items-center">
        <p class="fs-3">
          <i class="fa-solid fa-comments fs-1"></i>
          <span class="fw-bold">@lang('messages.comments') </span>
          294
        </p>
      </div>

      <form class="form" action="{{ route('comment.store', $viewData['sneeaker']->getId()) }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-floating">
          <textarea class="form-control bg-dark text-light" placeholder="Leave a comment here" id="floatingTextarea"
            name="comment"></textarea>
          <label for="floatingTextarea">{{__('CreateNew')}}</label>
          @error('comment')
            <div class="alert alert-danger mt-2">{{__('FieldMustBeFull')}}</div>
          @enderror
          <button type="submit" class="btn btn-outline-light mt-2">Create</button>
        </div>
      </form>

      @foreach ($viewData['comments'] as $comment)
        <x-comment-item :comment="$comment" />
      @endforeach

    </div>
  </div>
  @endsection