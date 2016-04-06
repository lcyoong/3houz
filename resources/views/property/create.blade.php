@extends('layouts.page')

@section('page_content')
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<!-- <div class="panel-heading">@lang('property.create')</div> -->
				<div class="panel-body">
					{{ Form::open(['url'=>url('property/create'), 'action'=>'post', 'class'=>'form-horizontal']) }}
					@if(auth()->user()->can('create_for_users'))
					<div class="form-group">
						{{ Form::label('prop_owner', trans('property.prop_owner'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::text('prop_owner', old('prop_owner'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_owner') }}
						</div>
					</div>
					@else
					{{ Form::hidden('prop_owner', auth()->user()->id) }}
					@endif

					<div class="form-group">
						{{ Form::label('prop_label', trans('property.prop_label'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::text('prop_label', old('prop_label'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_label') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_name', trans('property.prop_name'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::text('prop_name', old('prop_name'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_name') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_type', trans('property.prop_type'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::select('prop_type', $type, old('prop_type'), ['class'=>'form-control', 'placeholder'=>'']) }}
							{{ FormError::block($errors, 'prop_type') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_tenure', trans('property.prop_tenure'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::select('prop_tenure', $tenure, '', ['class'=>'form-control', 'placeholder'=>'']) }}
							{{ FormError::block($errors, 'prop_tenure') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_furnishing', trans('property.prop_furnishing'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::select('prop_furnishing', $furnish, '', ['class'=>'form-control', 'placeholder'=>'']) }}
							{{ FormError::block($errors, 'prop_furnishing') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_location', trans('property.prop_location'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::select('prop_location', $postcode, '', ['class'=>'form-control select2', 'placeholder'=>'']) }}
							{{ FormError::block($errors, 'prop_name') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_no_bedrooms', trans('property.prop_no_bedrooms'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::selectRange('prop_no_bedrooms', 1, 10, old('prop_no_bedrooms'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_no_bedrooms') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_no_bathrooms', trans('property.prop_no_bathrooms'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::selectRange('prop_no_bathrooms', 1, 10, old('prop_no_bathrooms'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_no_bathrooms') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_built_up', trans('property.prop_built_up'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::text('prop_built_up', old('prop_built_up'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_built_up') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_price', trans('property.prop_price'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::text('prop_price', old('prop_price'), ['class'=>'form-control']) }}
							{{ FormError::block($errors, 'prop_price') }}
						</div>
					</div>

					<div class="form-group">
						{{ Form::label('prop_description', trans('property.prop_description'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::textarea('prop_description', old('prop_description'), ['class'=>'form-control', 'rows'=>8]) }}
							{{ FormError::block($errors, 'prop_description') }}
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-8 col-md-offset-4">
							{{ Form:: button('<i class="fa fa-btn fa-plus"></i>' . trans('common.button_submit'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
							<!-- {{ Form:: button('<i class="fa fa-btn fa-ban"></i>' . trans('common.button_cancel'), ['class'=>'btn btn-primary cancel-button', 'goto'=> url('property') ]) }} -->
						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
@endsection
