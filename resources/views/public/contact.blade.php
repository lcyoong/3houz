@extends('layouts.public.page')

@section('page_content')
  <div class="ct-site--map">
    <div class="container">
        <a href="{{ url('/') }}">Home</a>
        <a href="#">Contact Us</a>
    </div>
  </div>
  <header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="140" data-type="parallax" data-bg-image="assets/images/demo-content/agency-parallax.jpg" data-bg-image-mobile="assets/images/demo-content/agency-parallax.jpg">
      <div class="ct-mediaSection-inner">
          <div class="container">
              <div class="ct-heading--main text-center">
                  <h3 class="text-uppercase ct-u-text--white">Contact Us</h3>
              </div>
          </div>
      </div>
  </header>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <i class="fa fa-envelope"></i> <a href="mailto:{{ config('3houz.email') }}">{{ config('3houz.email') }}</a>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
@endsection
