@extends('adminlte::page')

@section('title', $viewData['title'])

@section('content_header')
  <h1>Edit {{ $viewData['user']->getName() }}</h1>
  @stop @section('content')
  <form action="{{ route('admin.userUpdate', $viewData['user']->getId()) }}" method="post" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="mb-3">
      <label for="" class="form-label">{{__('Name')}}</label>
      <div class="col-md-6">
        <input id="name" name="name" type="text" class="form-control" value="{{ $viewData['user']->getName() }}">
      </div>
      @error('name')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">{{__('Email')}}</label>
      <div class="col-md-6">
        <input id="email" name="email" type="text" class="form-control" value="{{ $viewData['user']->getEmail() }}">
      </div>
      @error('email')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">{{__('Role')}}</label>
      <div class="col-md-6">
        <input id="rol" name="rol" type="text" class="form-control" value="{{ $viewData['user']->getRol() }}">
      </div>
      @error('rol')
        <span class="invalid-feedback d-block" role="alert">
          <strong>*{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <a href="{{ route('admin.user') }}" class="btn btn-secondary" tabindex="5">Cancel</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Save</button>
  </form>
  @stop @section('css')
  <link rel="stylesheet" href="/css/admin_custom.css" />
  @stop @section('js') @stop