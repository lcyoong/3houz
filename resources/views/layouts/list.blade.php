@extends('layouts.app')

@section('content')
<div class="container">
	@if (isset($page_title))
	<div class="pull-left page_title">{{ $page_title }}</div>
	@endif

  <div class="pull-right">
		@yield('list_action')
  </div>
  <div class="clearfix"></div>


	@if (isset($filter) && view()->exists($filter))
		@include($filter)
	@endif

	@yield('content_list')
</div>
@endsection
