@extends('layouts.list')
@section('content_list')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<!-- <th>{{ trans('property_favourite.fav_owner') }}</th> -->
					<th>{{ trans('property_favourite.fav_property') }}</th>
					<th>{{ trans('property.prop_price') }}</th>
					<th>{{ trans('menu.action_column') }}</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($favs as $fav)
			<tr>
				<!-- <td>{{ $fav->name }}</td> -->
				<td><i class="fa fa-heart"></i> {{ $fav->prj_name }}, {{ $fav->prop_location }}
					<div>
						<span class="label label-info">{{ $fav->prop_built_up }} {{ config('3houz.bu_metric') }}</span>
						<span class="label label-info">{{ $fav->prop_no_bedrooms }} @lang('property.bedrooms')</span>
						<span class="label label-info">{{ $fav->prop_no_bathrooms }} @lang('property.bathrooms')</span>
						<span class="label label-info">{{ $fav->prop_tenure }}</span>
					</div>
				</td>
				<td>{{ config('3houz.currency') }}{{ number_format($fav->prop_price) }}</td>
				<td>
					<a href="{{ url('/property_detail/'. $fav->prop_id . '/' . ucwords(str_replace(' ', '-', $fav->prj_name . ' ' . $fav->prop_location))) }}" target=_blank><i class="fa fa-eye"></i></a>
					<a href="{{ url('favourites/'.$fav->fav_id.'/delete') }}" class="btn-modal"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $favs->links() }}
	</div>
</div>
@endsection
