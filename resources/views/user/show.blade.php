@extends("layouts.app")
@section('content')
  <div class="bg-dark text-light pt-3" style="min-height: 100vh;">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          @if ($viewData['current'])
            <form action="{{ route('user.update', $viewData['user']->getId()) }}" method="POST"
              enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                  value="{{ $viewData['user']->getName() }}">
                @error('name')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>*{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                  value="{{ $viewData['user']->getEmail() }}">
                @error('email')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>*{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password'</label>
                <input type="password" class="form-control" id="password" name="password"
                  placeholder="writte your new password">
                @error('password')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>*{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="mb-3">
                <label class="form-check-label" for="image">Image</label>
                <input type="file" class="" id="image" name="image">
                @error('image')
                  <span class="invalid-feedback d-block" role="alert">
                    <strong>*{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <button type="submit" class="btn btn-outline-light">Update</button>
            </form>
          @else
            <div class="group d-flex flex-column justify-content-center align-items-center">
              <span class="fw-bold">Name : </span>
              <p class="fw-light">{{ $viewData['user']->getName() }}</p>
            </div>
            <div class="group d-flex flex-column justify-content-center align-items-center">
              <span class="fw-bold">Email : </span>
              <p class="fw-light">{{ $viewData['user']->getEmail() }}</p>
            </div>
            <div class="group d-flex flex-column justify-content-center align-items-center">
              <span class="fw-bold">Created At : </span>
              <p class="fw-light">{{ $viewData['user']->getCreateAt() }}</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection