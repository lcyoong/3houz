<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url"                content="{{ Request::url() }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $title or config('3houz.title') }}" />
    <meta property="og:description"        content="{{ $page_desc or config('3houz.desc') }}" />
    <meta property="og:image"              content="{{ $page_img or asset('img/logo-3houz-wp.png') }}" />

    <title>{{ isset($title) ? $title . ' |' : '' }} {{ config('3houz.title') }}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.5/css/bootstrap-slider.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="{{ URL::asset('css/style.css')}}" rel="stylesheet"/>
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @yield('css')

    <script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.js')}}"></script>

</head>
<body id="app-layout" class="ct-headroom--scrollUpMenu cssAnimate">
    @include('partials.public.main_nav')

    <section class="ct-u-paddingBottom60">
      <div class="container">
      	@include('partials.messagebag')
      </div>

      @yield('content')
    </section>

    @include('partials.public.footer')

    @include('partials.modal')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/6.1.5/bootstrap-slider.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/dependencies.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/main_3houz.js')}}"></script>
    @include('includes.ajax_location')
    @yield('js')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="//load.sumome.com/" data-sumo-site-id="7378921d17b5bfb054f6a96749d83b7a19eec8b4a264b3619597efe6bf95866c" async="async"></script>

    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="//v2.zopim.com/?3p2veBikCXOWGEieX2FwU4NMic93Nome";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>
    <!--End of Zopim Live Chat Script-->
</body>
</html>
