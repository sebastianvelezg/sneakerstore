@extends("layouts.app")
@section('title', $viewData['title'])
@section('content')

<div class="bg-dark text-light d-flex justify-content-around align-items-center bg-primary" style="height: calc(65vh - 3rem);">
    <div class="container d-flex justify-content-around align-items-center">
      <div class="col-md-5">
        <h1>{{__('Sneaker Support')}}</h1>
        <h2>{{__('We are here for all you need, can we help you?')}}</h2>
        <p class="fs-3">{{__'You can write your problem, suggestion'}}</p>
        <form class="form-floating">
          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
          <label for="floatingTextarea" style="color: #000;">{__'Tell us!'}}</label>
          <button class="btn btn-outline-light my-3">{{__'Send'}}</button>
        </form>
        <p class="fs-4">{{__('For us it is very important to know your opinions, we will contact you as soon as possible, Sneaker store!')}}</p>
      </div>

      <div class="col-md-5">
        <img src="/images/dunk4.png" style="width: 100%; height: 25vh; object-fit:cover;" alt="">
      </div>
    </div>
  </div>
@endsection