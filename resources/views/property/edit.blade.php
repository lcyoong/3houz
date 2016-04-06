@extends('layouts.page')

@section('page_content')
  <div class="row">
      <div class="col-md-8">
          <div class="panel panel-default">
              <!-- <div class="panel-heading">@lang('property.prop_id') #{{ $prop->prop_id }}</div> -->
              <div class="panel-body">
              	{{ Form::open(['url'=>url('property/edit'), 'action'=>'post', 'class'=>'form-horizontal']) }}
              		{{ Form::hidden('prop_id', $prop->prop_id) }}

					<div class="form-group">
	                	{{ Form::label('prop_label', trans('property.prop_label'), ['class'=>'col-md-4 control-label']) }}
	                	<div class="col-md-8">
	                		{{ Form::text('prop_label', $prop->prop_label, ['class'=>'form-control']) }}
	                		{{ FormError::block($errors, 'prop_label') }}
	                	</div>
                  	</div>

					<div class="form-group">
                    	{{ Form::label('prop_name', trans('property.prop_name'), ['class'=>'col-md-4 control-label']) }}
                    	<div class="col-md-8">
                    		{{ Form::text('prop_name', $prop->prop_name, ['class'=>'form-control']) }}
                    		{{ FormError::block($errors, 'prop_name') }}
                    	</div>
                  	</div>

                    <div class="form-group">
          						{{ Form::label('prop_type', trans('property.prop_type'), ['class'=>'col-md-4 control-label']) }}
          						<div class="col-md-8">
          							{{ Form::select('prop_type', $type, $prop->prop_type, ['class'=>'form-control', 'placeholder'=>'']) }}
          							{{ FormError::block($errors, 'prop_type') }}
          						</div>
          					</div>

                    <div class="form-group">
          						{{ Form::label('prop_tenure', trans('property.prop_tenure'), ['class'=>'col-md-4 control-label']) }}
          						<div class="col-md-8">
          							{{ Form::select('prop_tenure', $tenure, $prop->prop_tenure, ['class'=>'form-control', 'placeholder'=>'']) }}
          							{{ FormError::block($errors, 'prop_tenure') }}
          						</div>
          					</div>

          					<div class="form-group">
          						{{ Form::label('prop_furnishing', trans('property.prop_furnishing'), ['class'=>'col-md-4 control-label']) }}
          						<div class="col-md-8">
          							{{ Form::select('prop_furnishing', $furnish, $prop->prop_furnishing, ['class'=>'form-control', 'placeholder'=>'']) }}
          							{{ FormError::block($errors, 'prop_furnishing') }}
          						</div>
          					</div>

          <div class="form-group">
						{{ Form::label('prop_location', trans('property.prop_location'), ['class'=>'col-md-4 control-label']) }}
						<div class="col-md-8">
							{{ Form::select('prop_location', $postcode, $prop->prop_location, ['class'=>'form-control select2', 'placeholder'=>'']) }}
							{{ FormError::block($errors, 'prop_name') }}
						</div>
					</div>

					<div class="form-group">
                    	{{ Form::label('prop_no_bedrooms', trans('property.prop_no_bedrooms'), ['class'=>'col-md-4 control-label']) }}
                    	<div class="col-md-8">
                    		{{ Form::selectRange('prop_no_bedrooms', 1, 10, $prop->prop_no_bedrooms, ['class'=>'form-control']) }}
                    		{{ FormError::block($errors, 'prop_no_bedrooms') }}
                    	</div>
                    </div>

					<div class="form-group">
                    	{{ Form::label('prop_no_bathrooms', trans('property.prop_no_bathrooms'), ['class'=>'col-md-4 control-label']) }}
                    	<div class="col-md-8">
                    		{{ Form::selectRange('prop_no_bathrooms', 1, 10, $prop->prop_no_bathrooms, ['class'=>'form-control']) }}
                    		{{ FormError::block($errors, 'prop_no_bathrooms') }}
                    	</div>
                  	</div>

					<div class="form-group">
                    	{{ Form::label('prop_built_up', trans('property.prop_built_up'), ['class'=>'col-md-4 control-label']) }}
                    	<div class="col-md-8">
                    		{{ Form::text('prop_built_up', $prop->prop_built_up, ['class'=>'form-control']) }}
                    		{{ FormError::block($errors, 'prop_built_up') }}
                    	</div>
                  	</div>

                      <div class="form-group">
                      	{{ Form::label('prop_price', trans('property.prop_price'), ['class'=>'col-md-4 control-label']) }}
                      	<div class="col-md-8">
                      		{{ Form::text('prop_price', $prop->prop_price, ['class'=>'form-control']) }}
                      		{{ FormError::block($errors, 'prop_price') }}
                      	</div>
                      </div>

                      <div class="form-group">
            						{{ Form::label('prop_description', trans('property.prop_description'), ['class'=>'col-md-4 control-label']) }}
            						<div class="col-md-8">
            							{{ Form::textarea('prop_description', $prop->prop_description, ['class'=>'form-control', 'rows'=>8]) }}
            							{{ FormError::block($errors, 'prop_description') }}
            						</div>
            					</div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                          	{{ Form:: button('<i class="fa fa-btn fa-save"></i>' . trans('common.button_save'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
                          </div>
                      </div>
                  {{ Form::close() }}
              </div>
          </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="detail-row">
              <div class="row">
                <div class="col-md-6">@lang('property.prop_id')</div>
                <div class="col-md-6 text-right">{{ $prop->prop_id }}</div>
              </div>
            </div>
            <div class="detail-row">
              <div class="row">
                <div class="col-md-6">@lang('form.created_at')</div>
                <div class="col-md-6 text-right">{{ $prop->created_at }}</div>
              </div>
            </div>
            <div class="detail-row detail-row-last">
              <div class="row">
                <div class="col-md-6">@lang('form.updated_at')</div>
                <div class="col-md-6 text-right">{{ $prop->updated_at }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection
