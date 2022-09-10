@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="bg-dark text-light d-flex justify-content-around align-items-center" style="height: calc(100vh - 3rem);">
    <div class="container d-flex justify-content-around align-items-center">
      <div class="col-md-5">
        <h1>Support</h1>
        <h2>Can we help you?</h2>
        <p class="fs-3">You can write your problem, suggestion</p>
        <form class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          <label for="floatingTextarea" style="color: #000;">What Do You Need?</label>
          <button class="btn btn-outline-light my-3">Send</button>
        </form>
        <p class="fs-4">For us it is very important to know your opinions, we will contact you as soon as possible!</p>
      </div>

      <div class="col-md-5">
        <img src="/images/dunk4.png" style="width: 100%; height: 25vh; object-fit:cover;" alt="">
      </div>
    </div>
  </div>
@endsection