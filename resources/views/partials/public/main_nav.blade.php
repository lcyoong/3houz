<nav class="ct-menuMobile">
    <ul class="ct-menuMobile-navbar">
      @if(Auth::guest())
        <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i> Login</a></li>
        <li><a href="{{ url('/register') }}"><i class="fa fa-plus-square"></i> Register</a></li>
      @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ url('/user/edit') }}"><i class="fa fa-btn fa-user"></i> @lang('menu.edit_profile')</a></li>
                <li><a href="{{ url('/password/edit') }}"><i class="fa fa-btn fa-unlock"></i> @lang('menu.change_password')</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/property') }}"><i class="fa fa-home"></i> My Properties</a></li>
      @endif
      <li class="dropdown"><a href="{{ url('/') }}">{{ trans('general.menu_properties') }}</a></li>
      <li class="dropdown"><a href="{{ url('/contact') }}">{{ trans('general.menu_contact') }}</a></li>
    </ul>
</nav>
@include('partials.public.mobile_search')

<div id="ct-js-wrapper" class="ct-pageWrapper">

<div class="ct-navbarMobile">
    <button type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/logo-3houz.png') }}" alt="{{ config('3houz.brand') }}"> </a>
    <button type="button" class="searchForm-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span><i class="fa fa-search"></i></span>
    </button>
</div>

<div class="ct-topBar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/property') }}"><i class="fa fa-home"></i> My Properties</a></li>
                @if(Auth::guest())
                  <li><a href="{{ url('/login') }}"><i class="fa fa-user"></i> Login</a></li>
                  <li><a href="{{ url('/register') }}"><i class="fa fa-plus-square"></i> Register</a></li>
                @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ url('/user/edit') }}"><i class="fa fa-btn fa-user"></i> @lang('menu.edit_profile')</a></li>
                          <li><a href="{{ url('/password/edit') }}"><i class="fa fa-btn fa-unlock"></i> @lang('menu.change_password')</a></li>
                          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
                      </ul>
                  </li>
                @endif
              </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar yamm" role="navigation" data-heighttopbar="40px" data-startnavbar="0">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo-3houz.png') }}" alt="{{ config('3houz.brand') }}">
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav ct-navbar--fadeInUp navbar-right">
              <li class="dropdown"><a href="{{ url('/') }}"><i class="fa fa-search"></i> {{ trans('general.menu_properties') }}</a></li>
              <li class="dropdown"><a href="{{ url('/contact') }}">{{ trans('general.menu_contact') }}</a></li>
            </ul>
            <!-- <a class="btn btn-primary btn-transparent--border ct-u-text--motive" href="submission.html">List Property</a> -->
        </div>
        <div class="clearfix"></div>
        <!-- <div class="ct-shapeBottom"></div> -->
    </div>
</nav>
