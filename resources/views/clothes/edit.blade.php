@extends('adminlte::page')
@section('title', 'Edit Clothes')
@section('content_header')
<h1>Edit {{ $viewData['clothe']->getBrand() }} {{ $viewData['clothe']->getType() }}</h1>
@stop
@section('content')

<form action="{{ route('admin.clotheUpdate', $viewData['clothe']->getId()) }}" method="POST" enctype="multipart/form-data"
  >
  @csrf @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Type: </label>
    <input id="type" name="type" type="text" class="form-control" value="{{ $viewData['clothe']->getType() }}" />
    @error('type')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Brand: </label>
    <input id="brand" name="brand" type="text" class="form-control"
      value="{{ $viewData['clothe']->getBrand() }}" />
    @error('brand')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description: </label>
    <input id="description" name="description" type="text" class="form-control"
      value="{{ $viewData['clothe']->getDescription() }}" />
    @error('description')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Id Category: </label>
    <select class="form-control" name="idCategory">
      @foreach ($viewData['categories'] as $category)
        <option value="{{ $category->getId() }}"
          {{ $category->getId() == $viewData['clothe']->getIdCategory() ? 'selected' : '' }}>
          {{ $category->getName() }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Realease Date: </label>
    <input id="releasedate" name="releasedate" type="text" class="form-control"
      value="{{ $viewData['clothe']->getReleasedate() }}" />
    @error('releasedate')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Reatil Price: </label>
    <input id="retailprice" name="retailprice" type="number" class="form-control"
      value="{{ $viewData['clothe']->getRetailprice() }}" />
    @error('retailprice')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Price: </label>
    <input id="price" name="price" type="number" class="form-control"
      value="{{ $viewData['clothe']->getPrice() }}" />
    @error('price')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Image: </label>
    <input id="image" name="image" type="file" />
  </div>
  <div class="d-flex justify-content-start pt-2 pb-4 pl-5">
    <img src="./../../../image/clothes/{{ $viewData['clothe']->getId() }}/{{ $viewData['clothe']->getImage() }}" alt=""
      style="width: 30rem" class="mx-5" />
  </div>
  <div>
    <a href="/clothes" class="btn btn-secondary" tabindex="5">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Save</button>
  </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop