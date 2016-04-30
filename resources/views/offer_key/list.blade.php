@extends('layouts.list')
@section('content_list')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<!-- <th>{{ trans('offer_key.ofk_id') }}</th> -->
					<th>{{ trans('user.name') }}</th>
					<th>{{ trans('property.prop_name') }}</th>
					<th>{{ trans('menu.action_column') }}</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($keys as $key)
			<tr>
				<!-- <td>{{ $key->ofk_id }}</td> -->
				<td>{{ $key->name }}
					<div>
						<span class="label label-info"><i class="fa fa-phone"></i> {{ $key->tel_no }}</span>
						<span class="label label-info"><i class="fa fa-envelope"></i> {{ $key->email }}</span>
					</div>
				</td>
				<td>#{{ $key->prop_id }} - {{ $key->prj_name }}, {{ $key->prop_location }}
					<div><span class="label label-success"><i class="fa fa-home"></i> {{ $key->prop_address }}</span></div>
				</td>
				<td>
					<a href="{{ url('offer_key/'.$key->ofk_id.'/delete') }}" class="btn-modal"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $keys->links() }}
	</div>
</div>
@endsection
