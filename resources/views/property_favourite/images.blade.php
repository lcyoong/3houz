@extends('layouts.page')

@section('page_content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('property.images')</div>
                <div class="panel-body">
                	{{ Form::open(['url'=>url('property/edit'), 'action'=>'post', 'class'=>'form-horizontal']) }}
                		{{ Form::hidden('prop_id', $prop->prop_id) }}

						<div class="form-group">
		                	{{ Form::label('prop_label', trans('property.prop_label'), ['class'=>'col-md-4 control-label']) }}
		                	<div class="col-md-6">
		                		{{ Form::text('prop_label', $prop->prop_label, ['class'=>'form-control']) }}
		                		{{ FormError::block($errors, 'prop_label') }}
		                	</div>
                    	</div>

						<div class="form-group">
	                    	{{ Form::label('prop_label', trans('property.prop_name'), ['class'=>'col-md-4 control-label']) }}
	                    	<div class="col-md-6">
	                    		{{ Form::text('prop_name', $prop->prop_name, ['class'=>'form-control']) }}
	                    		{{ FormError::block($errors, 'prop_name') }}
	                    	</div>
                    	</div>

						<div class="form-group">
	                    	{{ Form::label('prop_no_bedrooms', trans('property.prop_no_bedrooms'), ['class'=>'col-md-4 control-label']) }}
	                    	<div class="col-md-6">
	                    		{{ Form::selectRange('prop_no_bedrooms', 1, 10, $prop->prop_no_bedrooms, ['class'=>'form-control']) }}
	                    		{{ FormError::block($errors, 'prop_no_bedrooms') }}
	                    	</div>
	                    </div>

						<div class="form-group">
	                    	{{ Form::label('prop_no_bathrooms', trans('property.prop_no_bathrooms'), ['class'=>'col-md-4 control-label']) }}
	                    	<div class="col-md-6">
	                    		{{ Form::selectRange('prop_no_bathrooms', 1, 10, $prop->prop_no_bathrooms, ['class'=>'form-control']) }}
	                    		{{ FormError::block($errors, 'prop_no_bathrooms') }}
	                    	</div>
                    	</div>

						<div class="form-group">
	                    	{{ Form::label('prop_built_up', trans('property.prop_built_up'), ['class'=>'col-md-4 control-label']) }}
	                    	<div class="col-md-6">
	                    		{{ Form::text('prop_built_up', $prop->prop_built_up, ['class'=>'form-control']) }}
	                    		{{ FormError::block($errors, 'prop_built_up') }}
	                    	</div>
                    	</div>

                        <div class="form-group">
                        	{{ Form::label('prop_price', trans('property.prop_price'), ['class'=>'col-md-4 control-label']) }}
                        	<div class="col-md-6">
                        		{{ Form::text('prop_price', $prop->prop_price, ['class'=>'form-control']) }}
                        		{{ FormError::block($errors, 'prop_price') }}
                        	</div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                            	{{ Form:: button('<i class="fa fa-btn fa-save"></i>' . trans('common.button_save'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
                            	{{ Form:: button('<i class="fa fa-btn fa-ban"></i>' . trans('common.button_cancel'), ['class'=>'btn btn-primary cancel-button', 'goto'=> url('property') ]) }}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
