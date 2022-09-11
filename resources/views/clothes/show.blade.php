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
            {{ $viewData['clothe']->getDeveloper() }}
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
            {{ $viewData['clothe']->get Brand() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-calendar-plus"></i>
            <span class="font-weight-bold">Release Date: </span>
            {{ $viewData['clothe']->getReleasedate() }}
          </p>
        </div>
        <div class="col-md-6">
            <p>
              <i class="fas fa-dollar-sign"></i>
              <span class="font-weight-bold">Retail Price: </span>
              {{ $viewData['clothe']->getRetailrice() }}
            </p>
          </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-dollar-sign"></i>
            <span class="font-weight-bold">Price: </span>
            {{ $viewData['clothe']->getPrice() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-id-badge"></i>
            <span class="font-weight-bold">Colorway: </span>
            {{ $viewData['clothe']->getAgerating() }}
          </p>
        </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-abacus"></i>
            <span class="font-weight-bold">Description: </span>
            {{ $viewData['clothe']->getBuyquantity() }}
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <p>
            <i class="fas fa-calendar"></i>
            <span class="font-weight-bold">Date Updated: </span>
            {{ $viewData['clothe']->getUpdateAt() }}
          </p>
        </div>
        <div class="col-md-6">
          <p>
            <i class="fas fa-calendar-check"></i>
            <span class="font-weight-bold">Date Created: </span>
            {{ $viewData['clothe']->getCreateAt() }}
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <img src="./../../../image/clothes/{{ $viewData['clothe']->getId() }}/{{ $viewData['clothe']->getImage() }}" alt=""
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
          <h5 class="modal-title" id="addImageModalLabel">Add Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.clotheAddImages', $viewData['clothe']->getId()) }}" enctype="multipart/form-data"
            method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="exampleInputPassword1">Images: </label>
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
      @if ($image->getFilename() == $viewData['clothe']->getImage())
        @continue
      @endif

      <div class="col-md-4">
        <div class="card">
          <img width="100%" height="200" style="object-fit:cover;"
            src="./../../../image/clothes/{{ $viewData['clothe']->getId() }}/{{ $image->getFilename() }} " alt=""
            srcset="">
          <div class="card-body">
            <a href="{{ route('admin.clotheDeleteImage', $viewData['clothe']->getId() . ' $- ' . $image->getFilename()) }}"
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