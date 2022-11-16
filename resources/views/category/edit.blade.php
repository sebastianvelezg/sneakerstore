@extends('adminlte::page') 
@section('title', $viewData['title'])
@section('content_header')
  <h1>  Edit Categories</h1>
  @stop 
  @section('content')

  <form action="{{ route('admin.categoryUpdate', $viewData['category']->getId()) }}" method="POST" enctype="multipart/form-data" 
    >
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="" class="form-label">{{__('Name')}}</label>
      <div class="col-md-6">
        <input id="name" name="name" type="text" class="form-control" value="{{ $viewData['category']->getName() }}" />
      </div>
      @error('name')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">{{__'Description'}}</label>
      <div class="col-md-6">
        <input id="description" name="description" type="text" class="form-control"
          value="{{ $viewData['category']->getDescription() }}" />
      </div>
      @error('description')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">  {{__'type'}}</label>
      <div class="col-md-6">
        <input id="type" name="type" type="text" class="form-control" value="{{ $viewData['category']->getType() }}" />
      </div>
      @error('type')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">{{__'Image'}}</label>
      <input id="image" name="image" type="file" />
    </div>
    <div class="d-flex justify-content-start pt-2 pb-4 pl-5">
      <img src="./../../../image/category/{{ $viewData['category']->getImage() }}" alt="" style="width: 30rem" />
    </div>

    <a href="{{ route('admin.category') }}" class="btn btn-secondary" tabindex="5">{{__'Cancel'}}</a>
    <button type="submit" class="btn btn-primary" tabindex="4">{{__'Save'}}</button>
  </form>
  @stop @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css" />
  @stop @section('js') @stop