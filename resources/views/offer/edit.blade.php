@extends('layouts.page')

@section('css')
@endsection

@section('page_content')
{{ Form::open(['url'=>url('offer/edit'), 'action'=>'post']) }}
{{ Form::hidden('of_id', $offer->of_id) }}
<div class="record-info-bar">
  <ul>
    <li><i class="fa fa-clock-o"></i> @lang('form.created_at') {{ $offer->created_at }}</li>
    <li><i class="fa fa-edit"></i> @lang('form.updated_at') {{ $offer->updated_at }}</li>
  </ul>
</div>

<div class="row">
	<div class="col-md-3">
		<h4><i class="fa fa-user"></i> @lang('offer.buyer')</h4>
		<div class="form-group">
			{{ Form::label('of_buyer_name', trans('offer.of_buyer_name'), ['class'=>'control-label']) }}
			{{ Form::text('of_buyer_name', $offer->of_buyer_name, ['class'=>'form-control', 'readonly']) }}
			{{ FormError::block($errors, 'of_buyer_name') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_buyer_ic', trans('offer.of_buyer_ic'), ['class'=>'control-label']) }}
			{{ Form::text('of_buyer_ic', $offer->of_buyer_ic, ['class'=>'form-control', 'readonly']) }}
			{{ FormError::block($errors, 'of_buyer_ic') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_buyer_tel', trans('offer.of_buyer_tel'), ['class'=>'control-label']) }}
			{{ Form::text('of_buyer_tel', $offer->of_buyer_tel, ['class'=>'form-control', 'readonly']) }}
			{{ FormError::block($errors, 'of_buyer_tel') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_buyer_address', trans('offer.of_buyer_address'), ['class'=>'control-label']) }}
			{{ Form::textarea('of_buyer_address', $offer->of_buyer_address, ['class'=>'form-control', 'rows'=>3, 'readonly']) }}
			{{ FormError::block($errors, 'of_buyer_address') }}
		</div>
	</div>
	<div class="col-md-3">
		<h4><i class="fa fa-user"></i> @lang('offer.owner')</h4>
		<div class="form-group">
			{{ Form::label('of_owner_name', trans('offer.of_owner_name'), ['class'=>'control-label']) }}
			{{ Form::text('of_owner_name', $offer->of_owner_name, ['class'=>'form-control', 'readonly']) }}
			{{ FormError::block($errors, 'of_owner_name') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_owner_tel', trans('offer.of_owner_tel'), ['class'=>'control-label']) }}
			{{ Form::text('of_owner_tel', $offer->of_owner_tel, ['class'=>'form-control', 'readonly']) }}
			{{ FormError::block($errors, 'of_owner_tel') }}
		</div>
		<h4><i class="fa fa-home"></i> @lang('offer.property')</h4>
		<div class="form-group">
			{{ Form::label('of_property_address', trans('offer.of_property_address'), ['class'=>'control-label']) }} <a href="{{ url('property/'.$property->prop_id.'/preview') }}" target=_blank><i class="fa fa-eye"></i></a>
			{{ Form::textarea('of_property_address', $offer->of_property_address, ['class'=>'form-control', 'rows'=>3, 'readonly']) }}
			{{ FormError::block($errors, 'of_property_address') }}
		</div>
		<span class="label label-info">{{ $property->prop_built_up }} @lang('property.sqf')</span>
		<span class="label label-info">{{ $property->prop_tenure }}</span>
		<span class="label label-info">{{ $property->prop_no_bedrooms }} @lang('property.bedrooms')</span>
		<span class="label label-info">{{ $property->prop_no_bathrooms }} @lang('property.bathrooms')</span>
	</div>
	<div class="col-md-3">
		<h4><i class="fa fa-thumbs-o-up"></i> @lang('offer.deal')</h4>
		<div class="form-group">
			{{ Form::label('of_date', trans('offer.of_date'), ['class'=>'control-label']) }}
			<div class="input-group">
				{{ Form::text('of_date', $offer->of_date, ['class'=>'form-control datepicker', 'readonly']) }}
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
			{{ FormError::block($errors, 'of_date') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_purchase_price', trans('offer.of_purchase_price'), ['class'=>'control-label']) }}
			<div class="input-group">
				<span class="input-group-addon">{{ config('3houz.currency') }}</span>
				{{ Form::text('of_purchase_price', number_format($offer->of_purchase_price), ['class'=>'form-control', 'readonly']) }}
			</div>
			{{ FormError::block($errors, 'of_purchase_price') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_downpayment_percent', trans('offer.of_downpayment_percent'), ['class'=>'control-label']) }}
			{{ Form::text('of_downpayment_percent', number_format($offer->of_downpayment_percent), ['class'=>'form-control', 'readonly']) }}
			{{ FormError::block($errors, 'of_downpayment_percent') }}
		</div>
		<div class="form-group">
			{{ Form::label('of_paid_within', trans('offer.of_paid_within'), ['class'=>'control-label']) }}
			<div class="input-group">
				{{ Form::text('of_paid_within', $offer->of_paid_within, ['class'=>'form-control', 'readonly']) }}
				<span class="input-group-addon">@lang('offer.days')</span>
			</div>
			{{ FormError::block($errors, 'of_paid_within') }}
		</div>
	</div>
  <div class="col-md-3">
    <h4><i class="fa fa-file-o"></i> @lang('offer.action')</h4>
    <div class="form-group">
			{{ Form::label('of_status', trans('offer.of_status'), ['class'=>'control-label']) }}
			{{ Form::select('of_status', $dd_status, $offer->of_status, ['class'=>'form-control']) }}
			{{ FormError::block($errors, 'of_status') }}
		</div>
    <div class="form-group">
			{{ Form::label('of_owner_remarks', trans('offer.of_owner_remarks'), ['class'=>'control-label']) }}
			{{ Form::textarea('of_owner_remarks', $offer->of_owner_remarks, ['class'=>'form-control', 'rows'=>4]) }}
			{{ FormError::block($errors, 'of_status') }}
		</div>
    <div class="form-group">
      {{ Form::button(trans('form.btn_submit'), ['type'=>'submit', 'class'=>'btn btn-primary']) }}
    </div>
  </div>
</div>
{{ Form::close() }}
@endsection
