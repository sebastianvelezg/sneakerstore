@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Create Sneaker</h1>
@stop
@section('content')
<form action="{{ route('admin.sneakerStore') }}" enctype="multipart/form-data" method="POST">
  @method('POST')
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <div class="col-md-6">
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ old('name') }}" autocomplete="name" autofocus>
      @error('name')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Colorway</label>
    <div class="col-md-6">
      <input id="colorway" type="colorway" class="form-control @error('colorway') is-invalid @enderror" name="colorway"
        value="{{ old('colorway') }}" autocomplete="colorway">
      @error('colorway')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Brand</label>
    <div class="col-md-6">
      <input id="brand" type="brand" class="form-control @error('brand') is-invalid @enderror" name="brand"
        value="{{ old('brand') }}" autocomplete="brand">
      @error('brand')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <div class="col-md-6">
      <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description"
        value="{{ old('description') }}" autocomplete="description">
      @error('description')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Release Date</label>
    <div class="col-md-6">
      <input id="releasedate" type="releasedate" class="form-control @error('releasedate') is-invalid @enderror" name="releasedate"
        value="{{ old('releasedate') }}" autocomplete="releasedate">
      @error('releasedate')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Retail Price</label>
    <div class="col-md-6">
      <input id="retailprice" type="retailprice" class="form-control @error('retailprice') is-invalid @enderror" name="retailprice"
        value="{{ old('retailprice') }}" autocomplete="retailprice">
      @error('retailprice')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Price</label>
    <div class="col-md-6">
      <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" name="price"
        value="{{ old('price') }}" autocomplete="price">
      @error('price')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>
  <a href="{{ route('admin.sneaker') }}" class="btn btn-secondary" tabindex="5">Cancel</a>
  <button type="submit" class="btn bg-dark text-white">{{ __('Register') }}</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop