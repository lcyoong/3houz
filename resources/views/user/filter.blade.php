@extends('partials.list_filter')
@section('filter_content')
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('name', trans('user.name')) }}
            {{ Form::text('name', array_get(session()->get($search), 'name'), ['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('email', trans('user.email')) }}
            {{ Form::text('email', array_get(session()->get($search), 'email'), ['class'=>'form-control']) }}
        </div>
	</div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('tel_no', trans('user.tel_no')) }}
            {{ Form::text('tel_no', array_get(session()->get($search), 'tel_no'), ['class'=>'form-control']) }}
        </div>
	</div>
</div>
@endsection
