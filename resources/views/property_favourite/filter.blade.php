@extends('partials.list_filter')
@section('filter_content')
<div class="row">
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('prop_label', trans('property.prop_label')) }}
            {{ Form::text('prop_label', array_get(session()->get($search, []), 'prop_label'), ['class'=>'form-control']) }}
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {{ Form::label('prop_name', trans('property.prop_name')) }}
            {{ Form::text('prop_name', array_get(session()->get($search, []), 'prop_name'), ['class'=>'form-control']) }}
        </div>
    </div>
</div>
@endsection
