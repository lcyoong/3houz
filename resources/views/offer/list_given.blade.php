@extends('layouts.list')
@section('content_list')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>{{ trans('offer.of_property') }}</th>
					<th>{{ trans('offer.of_owner') }}</th>
					<th>{{ trans('offer.of_purchase_price') }}</th>
					<th>{{ trans('offer.of_downpayment_percent') }}</th>
					<th>{{ trans('offer.of_status') }}</th>
					<th>{{ trans('menu.action_column') }}</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($offers as $offer)
			<?php $prop = $offer->property; ?>
			<tr>
				<td>{{ $prop->project->prj_name }}, {{ $prop->prop_location }} <a href="{{ url('property/'.$offer->of_property.'/preview') }}" target=_blank><i class="fa fa-eye"></i></a>
					<div>
						<span class="label label-success"><i class="fa fa-home"></i> {{ $prop->prop_address }}</span>
					</div>
				</td>
				<td>{{ $offer->of_owner_name }}
					<div>
						<span class="label label-info"><i class="fa fa-eye"></i> {{ $offer->of_owner_tel }}</span>
					</div>
				</td>
				<td>{{ config('3houz.currency') }}{{ number_format($offer->of_purchase_price) }}</td>
				<td>{{ number_format($offer->of_downpayment_percent) }}</td>
				<td>{{ $offer->of_status }}</td>
				<td>
					<a href="{{ url('offer/'.$offer->of_id.'/view') }}" class='btn-modal'><i class="fa fa-eye"></i></a>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $offers->links() }}
	</div>
</div>
@endsection
