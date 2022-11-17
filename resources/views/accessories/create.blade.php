@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Create accessory {{ $viewData['category']->getName() }}</h1>
@stop
@section('content')
<form action="{{ route('admin.accessoryStore') }}" enctype="multipart/form-data" method="POST">
  @method('POST')
  @csrf

  <div class="mb-3">
    <label for="" class="form-label">{{__('Type')}}</label>
    <div class="col-md-6">
      <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type"
        value="{{ old('type') }}" autocomplete="type" autofocus>
      @error('type')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>


  <div class="mb-3">
    <label for="" class="form-label">{{__('Brand')}}</label>
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
    <label for="" class="form-label">{{__('Description')}}</label>
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
    <label for="" class="form-label">{{__('Material')}}</label>
    <div class="col-md-6">
      <input id="material" type="material" class="form-control @error('material') is-invalid @enderror" name="material"
        value="{{ old('material') }}" autocomplete="material">
      @error('material')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">{{__('Price')}}</label>
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

  <div class="mb-3">
    <label for="" class="form-label">{{__('Image')}}</label>
    <input id="image" name="image" type="file" class="" tabindex="3" />
    @error('image')
    <span class="invalid-feedback d-block" role="alert">
      <strong>*{{ $message }}</strong>
    </span>
  @enderror
  </div>

  <div class="mb-3">
    <input id="idCategory" name="idCategory" type="number" class="form-control" tabindex="3"
      value="{{ $viewData['category']->getId() }}" style="visibility: hidden; height: 0" />
  </div>

  <a href="{{ route('admin.category') }}" class="btn btn-secondary" tabindex="5">Cancel</a>
  <button type="submit" class="btn bg-dark text-white">Save</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop