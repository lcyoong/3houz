@extends($layout)
@section('content_panel')
{!! Form::open(['url'=>config('config.prefix') . '/add/upload', 'method'=>'post', 'class'=>'dropzone dz-clickable form-submit']) !!}
{!! Form::hidden('owner', $owner) !!}
<div class="dz-message">
<h4>Drag Photos to Upload</h4>
<span>Or click to browse</span>
</div>
{!! Form::close() !!}
<script type="text/javascript" src="{{ URL::asset('js/lcyoong/lcgallery/dropzone.js') }}"></script>
@stop