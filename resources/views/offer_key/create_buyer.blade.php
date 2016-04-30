@extends('layouts.modal')
@section('content')
<div class="row">
	<div class="col-md-6 text-center col-md-offset-3">
	{{ Form::open(['url'=>'property/'.$property->prop_id.'/offer_key', 'action'=>'POST', 'class'=>'ajax-submit', 'reload'=>1]) }}
	<h4>@lang('offer.enter_safety_key_text')</h4>
  {{ Form::hidden('ofk_property', $property->prop_id) }}
  <div class="form-group">
    {{ Form::text('ofk_key','', ['class'=>'form-control input-lg text-center']) }}
    {{ FormError::block_ajax('ofk_key') }}
	</div>
	<div class="form-group">
		{{ Form::button(trans('common.button_submit'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
	</div>
	{{ Form::close() }}
	</div>
</div>
@endsection
