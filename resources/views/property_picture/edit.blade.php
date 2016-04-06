@extends('layouts.modal')

@section('content')
<div class="container-fluid">
	{{ Form::open(['url'=>'property/pictures/edit', 'action'=>'POST']) }}
	{{ Form::hidden('pic_id', $picture->pic_id) }}
	<div class="row">
		<div class="col-md-4 thumbnail"><img src="{{ url('property-pic/' . $picture->pic_thumbnail_path) }}"></div>
		<div class="col-md-8">
			<div class="form-group">
				{{ Form::label('pic_description', trans('property_picture.pic_description'), ['class'=>'control-label']) }}
				{{ Form::text('pic_description', $picture->pic_description, ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::button('<i class="fa fa-save"></i> ' . trans('common.button_save'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
				{{ Form::button('<i class="fa fa-trash"></i> ' . trans('common.button_delete'), ['id'=>'deletePicture', 'class'=>'btn btn-primary', 'type'=>'submit']) }}
				{{ Form:: button('<i class="fa fa-btn fa-ban"></i>' . trans('common.button_cancel'), ['class'=>'btn btn-primary cancel-button', 'goto'=> url('property') ]) }}
			</div>
		</div>
	</div>
	{{ Form::close() }}
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
	$('body').on('click', '#deletePicture', function (event) {
			event.preventDefault();
			$.ajax({
					url: '{{url('property/pictures/'.$picture->pic_id.'/delete')}}',
					type: 'POST',
					data: {_token: "{{ csrf_token() }}"},
					dataType: 'json',
					success: function (data) {

					}
			});

			return false;
	});
});
</script>
@endsection
