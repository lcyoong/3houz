@extends('layouts.public.page')

@section('page_content')
<header class="ct-mediaSection text-center ct-u-text--white" data-stellar-background-ratio="0.3" data-height="600" data-type="parallax" data-bg-image="{{ url('img/hero-brisbane.jpg') }}" data-bg-image-mobile="{{ url('img/hero-brisbane.jpg') }}">
    <div class="ct-mediaSection-inner">
        <div class="ct-headerText--normal">
            <div class="container">
                <h1 class="text-uppercase ct-u-marginBottom40">{{ trans('general.hero_tagline') }}</h1>
                <div class="container ct-u-paddingTop20">
                  @include('partials.public.main_search')
                </div>
            </div>
        </div>
    </div>
</header>

@endsection

@section('js')
<script>
$(document).ready(function () {
  $('.input-slider').slider();
});
</script>
@endsection
