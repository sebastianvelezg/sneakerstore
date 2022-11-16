@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Sneakers List</h1>
@stop
@section('content')

    <div class="d-flex flex-wrap justify-content-around">
      @foreach ($viewData['categories'] as $category)
        @if($category->getType() == "sneaker")
          <div class="card" style="width: 40%;">
            <div class="card-header">
              <h3 class="card-title">{{ $category->getName() }}</h3>
              <div class="card-tools">
                <a href="{{ route('admin.sneakerCreate', ['id'=> $category->getId()]) }}" class="btn btn-dark mb-3">
                {{__'Create'}}
                  <i class="fas fa-plus"></i>
                </a>
                <a href="{{ route('admin.sneakersCategory', $category->getId()) }}" class="btn btn-dark mb-3">
                {{__'See All'}}
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
