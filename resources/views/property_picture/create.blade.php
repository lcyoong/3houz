@extends('layouts.page')

@section('page_content')
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">{{ $prop->pictures->count() }} @lang('general.pictures')</div>
            <div class="panel-body">
            	<div class="gallery">
              	@foreach($prop->pictures->chunk(6) as $set)
              		<div class="row">
              			@foreach($set as $pic)
                			<div class="col-md-2 gallery_picture">
												<a href="{{ url('property/pictures/'.$pic->pic_id.'/edit') }}" class="thumbnail btn-modal">
                					<img src="{{ url('property-pic/' . $pic->pic_thumbnail_path) }}">
												</a>
                			</div>
              			@endforeach
              		</div>
              	@endforeach
            	</div>
			{{ Form::open(['class'=>'dropzone', 'url'=>'property/pictures', 'action'=>'POST', 'id'=>'addPicturesForm']) }}
			{{ Form::hidden('prop_id', $prop->prop_id) }}
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
              <div class="col-md-6">@lang('property.prop_label')</div>
              <div class="col-md-6 text-right">{{ $prop->prop_label }}</div>
            </div>
          </div>
          <div class="detail-row">
            <div class="row">
              <div class="col-md-6">@lang('property.prop_name')</div>
              <div class="col-md-6 text-right">{{ $prop->prop_name }}</div>
            </div>
          </div>
          <div class="detail-row">
            <div class="row">
              <div class="col-md-6">@lang('property.prop_location')</div>
              <div class="col-md-6 text-right">{{ $prop->prop_location }}</div>
            </div>
          </div>
          <div class="detail-row">
            <div class="row">
              <div class="col-md-6">@lang('property.prop_price')</div>
              <div class="col-md-6 text-right">${{ number_format($prop->prop_price) }}</div>
            </div>
          </div>
          <div class="detail-row">
            <div class="row">
              <div class="col-md-6">@lang('property.prop_built_up')</div>
              <div class="col-md-6 text-right">{{ $prop->prop_built_up }}sqf</div>
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

@section('css')
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css') }}
@endsection

@section('js')
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js') }}
<script>
	Dropzone.options.addPicturesForm = {
		paramName: 'picture',
		maxFileSize: 2,
		acceptedFiles: '.jpg, .jpeg, .png, .bmp',
		success: function(file, response){
				location.reload();
    }
	}
</script>
@endsection
