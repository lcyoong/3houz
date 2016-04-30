@extends('layouts.modal')
@section('content')
<div class="modal-confirm">
	{{ Form::open(['url'=>'offer_key/delete', 'action'=>'POST']) }}
	{{ Form::hidden('ofk_id', $key->ofk_id) }}
	<h4>@lang('common.message_delete_confirm_key')</h4>
	<h2>{{ $buyer->name }}</h2>
	<div class="form-group">
		{{ Form::button('<i class="fa fa-trash"></i> ' . trans('common.button_delete'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
		{{ Form:: button('<i class="fa fa-btn fa-ban"></i>' . trans('common.button_cancel'), ['class'=>'btn btn-primary cancel-button', 'goto'=> url('property') ]) }}
	</div>
	{{ Form::close() }}
</div>
@endsection
