@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@stop
@section('content')

<div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-user"></i>
            <span class="font-weight-bold">name: </span>
            {{ $viewData['sneaker']->getName() }}
          </p>
        </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-tag"></i>
            <span class="font-weight-bold">Category: </span>
            {{ $viewData['category']->getName() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>
            <i class="fas fa-align-justify"></i>
            <span class="font-weight-bold">Brand: </span>
            {{ $viewData['sneaker']->getBrand() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-calendar-plus"></i>
            <span class="font-weight-bold">Release Date: </span>
            {{ $viewData['sneaker']->getReleasedate() }}
          </p>
        </div>
        <div class="col-md-6">
            <p>
              <i class="fas fa-dollar-sign"></i>
              <span class="font-weight-bold">Retail Price: </span>
              {{ $viewData['sneaker']->getRetailprice() }}
            </p>
          </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-dollar-sign"></i>
            <span class="font-weight-bold">Price: </span>
            {{ $viewData['sneaker']->getPrice() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-id-badge"></i>
            <span class="font-weight-bold">Colorway: </span>
            {{ $viewData['sneaker']->getColorway() }}
          </p>
        </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-abacus"></i>
            <span class="font-weight-bold">Description: </span>
            {{ $viewData['sneaker']->getDescription() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-calendar"></i>
            <span class="font-weight-bold">Date Updated: </span>
            {{ $viewData['sneaker']->getUpdateAt() }}
          </p>
        </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-calendar-check"></i>
            <span class="font-weight-bold">Date Created: </span>
            {{ $viewData['sneaker']->getCreateAt() }}
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <img src="./../../../image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $viewData['sneaker']->getImage() }}" alt=""
        style="width:80%;" class="mx-5">
    </div>
  </div>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#addImageModal">
  Add Image
    <i class="fas fa-plus"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addImageModalLabel">{{__('Add Image')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.sneakerAddImages', $viewData['sneaker']->getId()) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="exampleInputPassword1">{{__('Images:')}} </label>
              <input name="files[]" type="file" class="" id="exampleInputPassword1" multiple="multiple">
            </div>
            <button type="submit" class="btn btn-outline-light">Add Image</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <h3 class="text-center my-5">All Images</h3>

  <div class="d-flex flex-wrap">

    @foreach ($viewData['images'] as $image)
      @if ($image->getFilename() == $viewData['sneaker']->getImage())
        @continue
      @endif

      <div class="col-md-4">
        <div class="card">
          <img width="100%" height="200" style="object-fit:cover;"
            src="./../../../image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $image->getFilename() }} " alt=""
            srcset="">
          <div class="card-body">
            <a href="{{ route('admin.sneakerDeleteImage', $viewData['sneaker']->getId() . ' $- ' . $image->getFilename()) }}"
              class="btn btn-outline-danger stretched-link">
              Delete
              <i class="fas fa-trash"></i>
            </a>
          </div>
        </div>
      </div>
    @endforeach

  </div>

@endsection