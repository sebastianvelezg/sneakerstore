@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="d-flex justify-content-around align-items-center">
    <div class="container d-flex justify-content-around align-items-center">
        <div class="col-md-6">
            <h1 class="text-center">Sneakers Store</h1>
            <p class="fs-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum consectetur libero id faucibus nisl. Vivamus arcu felis bibendum ut tristique et. Proin libero nunc consequat interdum varius sit amet mattis vulputate. Neque ornare aenean euismod elementum nisi. Pretium viverra suspendisse potenti nullam ac tortor vitae.</p>
        </div>
    </div>
</div>

<div class="row justify-content-center my-5">
    <div class="col-md-6 bg-primary text-light p-5 rounded shadow-lg">
      <h2 class="text-center">Get all your sneakers here!</h2>
      <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Suspendisse in est ante in nibh mauris cursus.</p>
      <a href="#" class="btn btn-outline-light">Explore<i
          class="fa-solid fa-right-long"></i></a>
    </div>
  </div>
@endsection