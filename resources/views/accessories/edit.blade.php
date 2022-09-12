@extends('adminlte::page')
@section('title', 'Edit Accessory')
@section('content_header')
<h1>Edit {{ $viewData['accessory']->getBrand() }} {{ $viewData['accessory']->getType() }}</h1>
@stop
@section('content')

<form action="{{ route('admin.accessoryUpdate', $viewData['accessory']->getId()) }}" method="POST" enctype="multipart/form-data"
  >
  @csrf @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Type: </label>
    <input id="type" name="type" type="text" class="form-control" value="{{ $viewData['accessory']->getType() }}" />
    @error('type')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Brand: </label>
    <input id="brand" name="brand" type="text" class="form-control"
      value="{{ $viewData['accessory']->getBrand() }}" />
    @error('brand')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description: </label>
    <input id="description" name="description" type="text" class="form-control"
      value="{{ $viewData['accessory']->getDescription() }}" />
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
          {{ $category->getId() == $viewData['accessory']->getIdCategory() ? 'selected' : '' }}>
          {{ $category->getName() }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Material: </label>
    <input id="material" name="material" type="text" class="form-control"
      value="{{ $viewData['accessory']->getMaterial() }}" />
    @error('material')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Price: </label>
    <input id="price" name="price" type="number" class="form-control"
      value="{{ $viewData['accessory']->getPrice() }}" />
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
    <img src="./../../../image/accessories/{{ $viewData['accessory']->getId() }}/{{ $viewData['accessory']->getImage() }}" alt=""
      style="width: 30rem" class="mx-5" />
  </div>
  <div>
    <a href="/accessories" class="btn btn-secondary" tabindex="5">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Save</button>
  </div>
</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop