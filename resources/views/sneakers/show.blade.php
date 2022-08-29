@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@stop
@section('content')

<div class="row d-flex justify-content-center">
  <div class="col-md-9 d-flex justify-content-center">
    <div class="card">
      <div class="card-header">Sneaker Info</div>
      <div class="card-body">
        <div class="card-body">
          <h5 class="card-title">Name : {{ $sneakers->name }}</h5>
          <p class="card-text">Colorway : {{ $sneakers->colorway }}</p>
          <p class="card-text">Brand : {{ $sneakers->brand }}</p>
          <p class="card-text">Description : {{ $sneakers->description }}</p>
          <p class="card-text">Releasedate : {{ $sneakers->releasedate }}</p>
          <p class="card-text">Retailprice : {{ $sneakers->retailprice }}</p>
          <p class="card-text">Price : {{ $sneakers->price }}</p>
          <a href="{{ route('admin.sneaker') }}" title="Go Back">
            <button class="btn btn-primary btn-sm">
              <i class="fa fa-eye" aria-hidden="true"></i> 
              Back
            </button>
          </a>  
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop