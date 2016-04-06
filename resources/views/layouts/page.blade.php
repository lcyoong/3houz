@extends('layouts.app')

@section('content')
<div class="container">
  @if (isset($page_title))
  <div class="pull-left page_title">{{ $page_title }}</div>
  @endif
  @if (isset($go_back))
  <div class="pull-right">
  {{ Form:: button('<i class="fa fa-btn fa-angle-double-left"></i>' . trans('general.go_back_text'), ['class'=>'btn btn-primary cancel-button', 'goto'=> url($go_back) ]) }}
  </div>
  @endif
  <div class="clearfix"></div>

  @yield('page_content')
</div>
@endsection
