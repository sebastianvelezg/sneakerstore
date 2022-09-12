@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
@stop
@section('content')
<a href="{{ route('admin.accessoryCreate', $viewData['category']->getId()) }}" class="btn btn-dark mb-3">
  Create
  <i class="fas fa-plus"></i>
</a>

<div class="d-flex flex-wrap justify-content-around">

  @foreach ($viewData['accessories'] as $accessory)
    <div class="card" style="width: 40%;">
      <div class="card-header">
        <h3 class="card-title">{{ $accessory->getType() }}</h3>
        <form class="card-tools" action="{{ route('admin.accessoryDelete', $accessory->getId()) }}">
          @csrf @method('GET')
          <a href="{{ route('admin.accessoryEdit', $accessory->getId()) }}" class="btn btn-dark mb-3">
            Edit
            <i class="fas fa-pen"></i>
          </a>
          <button class="btn btn-dark mb-3" type="submit">
          Delete
            <i class="fas fa-trash"></i>
          </button>
          <a href="{{ route('admin.accessoryShow', $accessory->getId()) }}" class="btn btn-dark mb-3">
          More
            <i class="fas fa-angle-double-right"></i>
          </a>
        </form>
      </div>
      <div class="card-body d-flex justify-content-around">
        <img src="./../../../image/accessories/{{ $accessory->getId() }}/{{ $accessory->getImage() }}" alt="" width="200"
          class="mx-5" style="max-height: 10rem;">
        <p style="display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
          {{ $accessory->getDescription() }}</p>
      </div>
      <div class="card-footer d-flex justify-content-around">
        <i class="fas fa-calendar"></i>
        <p>{{ $accessory->getCreateAt() }}</p>
        <p>{{ $accessory->getUpdateAt() }}</p>
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