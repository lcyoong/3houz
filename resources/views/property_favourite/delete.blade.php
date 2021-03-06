@extends('layouts.modal')
@section('content')
<div class="modal-confirm">
	{{ Form::open(['url'=>'favourites/delete', 'action'=>'POST']) }}
	{{ Form::hidden('fav_id', $fav->fav_id) }}
	<h4>@lang('common.message_delete_confirm')</h4>
	<div class="form-group">
		{{ Form::button('<i class="fa fa-trash"></i> ' . trans('common.button_delete'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
		{{ Form:: button('<i class="fa fa-btn fa-ban"></i>' . trans('common.button_cancel'), ['class'=>'btn btn-primary cancel-button', 'goto'=> url('property') ]) }}
	</div>
	{{ Form::close() }}
</div>
@endsection
