@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@stop
@section('content')
<form action="{{ route('admin.sneakerUpdate', $sneakers as $sneaker->getId()) }}" method="post" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <div class="col-md-6">
      <input id="name" name="name" type="text" class="form-control" value="{{ $sneaker->getName() }}">
    </div>
    @error('name')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Colorway</label>
    <div class="col-md-6">
      <input id="colorway" name="colorway" type="text" class="form-control" value="{{ $sneaker->getColorway() }}">
    </div>
    @error('colorway')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">brand</label>
    <div class="col-md-6">
      <input id="brand" name="brand" type="text" class="form-control" value="{{ $sneaker->getBrand() }}">
    </div>
    @error('brand')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <div class="col-md-6">
      <input id="description" name="description" type="text" class="form-control" value="{{ $sneaker->getDescription() }}">
    </div>
    @error('description')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Release Date</label>
    <div class="col-md-6">
      <input id="releasedate" name="releasedate" type="text" class="form-control" value="{{ $sneaker->getReleasedate() }}">
    </div>
    @error('releasedate')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Retail Price</label>
    <div class="col-md-6">
      <input id="retailprice" name="retailprice" type="text" class="form-control" value="{{ $sneaker->getRetailprice() }}">
    </div>
    @error('retailprice')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Price</label>
    <div class="col-md-6">
      <input id="price" name="price" type="text" class="form-control" value="{{ $sneaker->getPrice() }}">
    </div>
    @error('price')
      <span class="invalid-feedback d-block" role="alert">
        <strong>*{{ $message }}</strong>
      </span>
    @enderror
  </div>


  <a href="{{ route('admin.sneaker') }}" class="btn btn-secondary" tabindex="5">Cancel</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Save</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop