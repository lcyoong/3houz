@extends('layouts.page')

@section('page_content')
{{ Form::open(['url'=>url('property/edit'), 'action'=>'post', 'class'=>'form-horizontal']) }}
{{ Form::hidden('prop_id', $prop->prop_id) }}
<div class="record-info-bar">
  <ul>
    <li><i class="fa fa-clock-o"></i> @lang('form.created_at') {{ $prop->created_at }}</li>
    <li><i class="fa fa-edit"></i> @lang('form.updated_at') {{ $prop->updated_at }}</li>
  </ul>
</div>
@include('property.progress')
  <div class="row">
      <div class="col-md-6">

					<div class="form-group">
                    	{{ Form::label('prop_name', trans('property.prop_name'), ['class'=>'col-md-4 control-label']) }}
                    	<div class="col-md-8">
                        <div class="input-group">
                    		    {{ Form::text('prop_name_text', $prop->project->prj_name, ['class'=>'form-control', 'id'=>'prop_name_text', 'data-toggle'=>"tooltip", 'data-placement'=>"right", 'data-container'=>"body", 'title'=>trans('property.name_help_text')]) }}
                            <span class="input-group-addon"><div id="name_succcess"></div></span>
                        </div>
                        {{ trans('property.project_not_found') }}
                        <!-- <span id="helpBlock" class="help-block">@lang('property.address_help_text')</span> -->
                        {{ Form::hidden('prop_name', $prop->prop_name, ['id'=>'prop_name']) }}
                    		{{ FormError::block($errors, 'prop_name') }}
                    	</div>
                  	</div>

                    <div class="form-group">
          						{{ Form::label('prop_location', trans('property.prop_location'), ['class'=>'col-md-4 control-label']) }}
          						<div class="col-md-8">
          							{{ Form::text('prop_location', $prop->prop_location, ['class'=>'form-control', 'readonly']) }}
          							{{ FormError::block($errors, 'prop_location') }}
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
                        <div class="input-group">
                      		{{ Form::text('prop_built_up', $prop->prop_built_up, ['class'=>'form-control']) }}
                          <div class="input-group-addon">{{ config('3houz.bu_metric') }}</div>
                        </div>
                    		{{ FormError::block($errors, 'prop_built_up') }}
                    	</div>
                  	</div>

      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{ Form::label('prop_price', trans('property.prop_price'), ['class'=>'col-md-4 control-label']) }}
          <div class="col-md-8">
            <div class="input-group">
              <div class="input-group-addon">{{ config('3houz.currency') }}</div>
              {{ Form::text('prop_price', $prop->prop_price, ['class'=>'form-control']) }}
            </div>
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
  				{{ Form::label('prop_key', trans('property.prop_key'), ['class'=>'col-md-4 control-label']) }}
  				<div class="col-md-8">
  					<div class="input-group">
  						<div class="input-group-addon"><i class="fa fa-key"></i></div>
  						{{ Form::text('prop_key', $prop->prop_key, ['class'=>'form-control', 'data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'data-container'=>"body", 'title'=>trans('property.key_help_text')]) }}
  					</div>
  					{{ FormError::block($errors, 'prop_key') }}
  				</div>
  			</div>

        <div class="form-group">
          {{ Form::label('prop_address', trans('property.prop_address'), ['class'=>'col-md-4 control-label']) }}
          <div class="col-md-8">
            {{ Form::textarea('prop_address', $prop->prop_address, ['class'=>'form-control', 'rows'=>4, 'data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'data-container'=>"body", 'title'=>trans('property.address_help_text')]) }}
            {{ FormError::block($errors, 'prop_address') }}
            <!-- <span id="helpBlock" class="help-block">@lang('property.address_help_text')</span> -->
          </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
              {{ Form:: button('<i class="fa fa-btn fa-save"></i>' . trans('common.button_save'), ['class'=>'btn btn-primary', 'type'=>'submit']) }}
            </div>
        </div>
      </div>
  </div>
{{ Form::close() }}
@endsection

@section('js')
<script>
$(document).ready(function() {

  $('[data-toggle="tooltip"]').tooltip();

  nameIndicator();

  $('body').on('change', '#prop_name_text', function (event) {
      $("#name_succcess").html('<i class="fa fa-times"></i>');
      $("#prop_name").val('');
  });

	$( "#prop_name_text" ).autocomplete({
		minLength: 3,
	  source: function(request, response) {
	      $.ajax({
	          url: "{{ url('ajax/get_projects') }}",
	          data: { term: $("#prop_name_text").val(), _token: "{{ csrf_token() }}"},
	          dataType: "json",
	          type: "POST",
	          success: function(data) {
	              response($.map(data, function(obj) {
	                  return {
	                      label: obj.prj_name,
	                      value: obj.prj_name,
	                      description: obj.prj_name,
												id: obj.prj_id,
												state: obj.prj_state,
												location: obj.prj_location,
	                  };
	              }));
	          }

	      });
	  },
		select: function( event, ui ) {
			$("#prop_name").val(ui.item.id);
			$("#prop_location").val(ui.item.location);
			$("#prop_state").val(ui.item.state);
      $("#name_succcess").html('<i class="fa fa-check"></i>');
			},
	})
});

function nameIndicator()
{
  if ($("#prop_name").val() != '') {
    $("#name_succcess").html('<i class="fa fa-check"></i>');
  } else {
    $("#name_succcess").html('<i class="fa fa-times"></i>');
  }
}
</script>
@endsection
