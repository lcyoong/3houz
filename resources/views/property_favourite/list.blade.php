@extends('layouts.list')
@section('content_list')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>{{ trans('property_favourite.fav_owner') }}</th>
					<th>{{ trans('property_favourite.fav_property') }}</th>
					<th>{{ trans('property.prop_price') }}</th>
					<th>{{ trans('property.prop_location') }}</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			@foreach ($favs as $fav)
			<tr>
				<td>{{ $fav->name }}</td>
				<td>{{ $fav->prop_name }}</td>
				<td>{{ number_format($fav->prop_price) }}</td>
				<td>{{ $fav->prop_location }}</td>
				<td>
					<a href="{{ url('/property_detail/'. $fav->prop_id) }}" target=_blank><i class="fa fa-eye"></i></a>
					<a href="{{ url('property/'.$fav->fav_id.'/delete') }}" class="btn-modal"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $favs->links() }}
	</div>
</div>
@endsection
