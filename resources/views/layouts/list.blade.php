@extends('layouts.app')

@section('content')
<div class="container">
	@if (isset($page_title))
	<div class="page_title">{{ $page_title }}</div>
	@endif

	@if (isset($filter) && view()->exists($filter))
		@include($filter)
	@endif

	@yield('content_list')
</div>
@endsection
