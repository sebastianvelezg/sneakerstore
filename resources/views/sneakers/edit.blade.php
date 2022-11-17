@extends('adminlte::page')
@section('title', 'Edit Sneaker')
@section('content_header')
<h1>Edit {{ $viewData['sneaker']->getName() }}</h1>
@stop
@section('content')

<form action="{{ route('admin.sneakerUpdate', $viewData['sneaker']->getId()) }}" method="POST" enctype="multipart/form-data"
  >
  @csrf @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">{{__'Name:'}}' </label>
    <input id="name" name="name" type="text" class="form-control" value="{{ $viewData['sneaker']->getName() }}" />
    @error('name')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Colorway:'}}' </label>
    <input id="colorway" name="colorway" type="text" class="form-control"
      value="{{ $viewData['sneaker']->getColorway() }}" />
    @error('colorway')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Brand:'}} </label>
    <input id="brand" name="brand" type="text" class="form-control"
      value="{{ $viewData['sneaker']->getBrand() }}" />
    @error('brand')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Description:'}} </label>
    <input id="description" name="description" type="text" class="form-control"
      value="{{ $viewData['sneaker']->getDescription() }}" />
    @error('description')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Id Category:'}} </label>
    <select class="form-control" name="idCategory">
      @foreach ($viewData['categories'] as $category)
        <option value="{{ $category->getId() }}"
          {{ $category->getId() == $viewData['sneaker']->getIdCategory() ? 'selected' : '' }}>
          {{ $category->getName() }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Realease Date:'}} </label>
    <input id="releasedate" name="releasedate" type="text" class="form-control"
      value="{{ $viewData['sneaker']->getReleasedate() }}" />
    @error('releasedate')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Reatil Price:'}} </label>
    <input id="retailprice" name="retailprice" type="number" class="form-control"
      value="{{ $viewData['sneaker']->getRetailprice() }}" />
    @error('retailprice')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">{{__'Price:'}} </label>
    <input id="price" name="price" type="number" class="form-control"
      value="{{ $viewData['sneaker']->getPrice() }}" />
    @error('price')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">{{__'Image:'}} </label>
    <input id="image" name="image" type="file" />
  </div>
  <div class="d-flex justify-content-start pt-2 pb-4 pl-5">
    <img src="./../../../image/sneakers/{{ $viewData['sneaker']->getId() }}/{{ $viewData['sneaker']->getImage() }}" alt=""
      style="width: 30rem" class="mx-5" />
  </div>
  <div>
    <a href="/sneakers" class="btn btn-secondary" tabindex="5">{{__'Cancel'}}</a>
    <button type="submit" class="btn btn-primary" tabindex="4">{{__'Save'}}</button>
  </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop