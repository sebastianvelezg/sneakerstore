@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Clothes List</h1>
@stop
@section('content')

    <div class="d-flex flex-wrap justify-content-around">
      @foreach ($viewData['categories'] as $category)
        @if($category->getType() == "clothe")
          <div class="card" style="width: 40%;">
            <div class="card-header">
              <h3 class="card-title">{{ $category->getName() }}</h3>
              <div class="card-tools">
                <a href="{{ route('admin.clotheCreate', ['id'=> $category->getId()]) }}" class="btn btn-dark mb-3">
                Create
                  <i class="fas fa-plus"></i>
                </a>
                <a href="{{ route('admin.clothesCategory', $category->getId()) }}" class="btn btn-dark mb-3">
                See All
                  <i class="fas fa-eye"></i>
                </a>
              </div>
            </div>
          </div>
        @endif
    @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

{{-- @foreach($sneakers as $sneaker)
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
@endforeach --}}

{{-- <img src="./../../../image/sneaker/{{ $sneaker->getImage() }}" alt="" width="200" class="mx-5"
        style="max-height: 10rem;"> --}}