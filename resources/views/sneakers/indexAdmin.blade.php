@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Sneakers List</h1>
@stop
@section('content')
<a href="{{ route('admin.sneakerCreate') }}" class="btn btn-dark mb-3">
    Create A Sneaker
      <i class="fas fa-plus"></i>
    </a>
    <div class="d-flex flex-wrap justify-content-around">
        @foreach($sneakers as $sneaker)
        <div class="card" style="width: 40%;">
          <div class="card-header">
            <h3 class="card-title">{{ $sneaker->getName() }} &nbsp;</h3>
            <h3 class="card-title">{{ $sneaker->getColorway() }} </h3>
            <form class="card-tools" action="{{ route('admin.sneakerDelete', $sneaker->getId()) }}">
              @csrf @method('GET')
              <a href="{{ route('admin.sneakerEdit', $sneaker->getId()) }}" class="btn btn-dark mb-3">
              Edit
                <i class="fas fa-pen"></i>
              </a>
              <button class="btn btn-dark mb-3" type="submit">
              Delete
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
          <div class="card-body d-flex justify-content-around">
            {{-- <img src="./../../../image/sneaker/{{ $sneaker->getImage() }}" alt="" width="200" class="mx-5"
              style="max-height: 10rem;"> --}}
            <p style="display: -webkit-box; -webkit-line-clamp: 6; -webkit-box-orient: vertical; overflow: hidden;">
              {{ $sneaker->getDescription() }}</p>
          </div>
          <div class="card-footer d-flex justify-content-around">
            <i class="fas fa-calendar"></i>
            <p>{{ $sneaker->getCreateAt() }}</p>
            <p>{{ $sneaker->getUpdateAt() }}</p>
            <i class="fas fa-calendar"></i>
          </div>
        </div>
      @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop