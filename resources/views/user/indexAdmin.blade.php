@extends('adminlte::page') @section('title', $viewData['title'])
@section('content_header')
  <h1>Users List</h1>
  @stop @section('content')
  <a href="{{ route('admin.userCreate') }}" class="btn btn-dark mb-3">
    Create
    <i class="fas fa-plus"></i>
  </a>

  <div class="d-flex flex-wrap justify-content-around">

    @foreach ($viewData['users'] as $user)
      <div class="card" style="width: 40%;">
        <div class="card-header">
          <h3 class="">{{ $user->getName() }}</h3>
          @if ($user->getRol() == 'client')
            <form class="" action="{{ route('admin.userDelete', $user->getId()) }}">
              @csrf @method('GET')
              <a href="{{ route('admin.userEdit', $user->getId()) }}" class="btn btn-dark mb-3">
              Edit
                <i class="fas fa-pen"></i>
              </a>
              <button class="btn btn-dark mb-3" type="submit">
              Delete
                <i class="fas fa-trash"></i>
              </button>
            </form>
          @else
            <div class="">
              <p style="font-size: 1.3rem;">Admin</p>
            </div>
          @endif
        </div>

        <div class="card-footer d-flex justify-content-around">
          <i class="fas fa-calendar"></i>
          <p>{{ $user->getCreateAt() }}</p>
          <p>{{ $user->getUpdateAt() }}</p>
          <i class="fas fa-calendar"></i>
        </div>
      </div>
    @endforeach

  </div>

@endsection