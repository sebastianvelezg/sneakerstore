@extends('layouts.app')
@section('title', 'Home Page - Online Store')
@section('content')

<div id="sneakercarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/images/dunk2.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/images/dunk3.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/images/dunk4.png" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="/images/dunk5.png" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#sneakercarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#sneakercarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@endsection