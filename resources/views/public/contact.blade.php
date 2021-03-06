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
    <div class="page-header">
      <h1>Get in touch!</h1>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h3><i class="fa fa-envelope"></i> <a href="mailto:{{ config('3houz.email') }}">{{ config('3houz.email') }}</a></h3>
      </div>
      <div class="col-md-6">
        <h3><i class="fa fa-phone"></i> {{ config('3houz.mobile') }}</h3>
      </div>
    </div>
    <a href="#" class="popupchat">*Or leave a message on our chat widget</a>
  </div>
@endsection

@section('js')
<script>
$(document).ready(function () {
  $('body').on('click', '.popupchat', function (event) {
    event.preventDefault();
    $zopim(function() {
      $zopim.livechat.window.show();
    });
  });
});
</script>
@endsection
