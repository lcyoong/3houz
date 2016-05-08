@extends('layouts.list')

@section('list_action')
<a href="{{ url('property/create') }}">{{ Form:: button('<i class="fa fa-btn fa-plus"></i>' . trans('property.title_create'), ['class'=>'btn btn-primary']) }}</a>
@endsection

@section('content_list')
<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>{{ trans('property.prop_id') }}</th>
					<th>{{ trans('property.prop_name') }}</th>
					<th>{{ trans('property.prop_price') }}</th>
					<th>{{ trans('property.prop_owner') }}</th>
					<th>{{ trans('property.prop_verified') }}</th>
					<th>{{ trans('menu.action_column') }}</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($props as $prop)
			<tr>
				<td>{{ $prop->prop_id }}</td>
				<td>{{ $prop->prj_name }}, {{ $prop->prop_location }}
					<div>
						<span class="label label-info"><i class="fa fa-eye"></i> {{ $prop->prop_view }}</span>
						<span class="label label-info"><i class="fa fa-unlock-alt"></i> {{ $prop->unlocks->count() }}</span>
						<span class="label label-info"><i class="fa fa-key"></i> {{ $prop->keys->count() }}</span>
						<span class="label label-info"><i class="fa fa-file"></i> {{ $prop->offers->count() }}</span>
						<span class="label label-success"><i class="fa fa-home"></i> {{ $prop->prop_address }}</span>
					</div>
				</td>
				<td>{{ config('3houz.currency') }}{{ number_format($prop->prop_price) }}</td>
				<td>{{ $prop->name }}</td>
				<td>{{ trans('general.'.$prop->prop_verified) }}</td>
				<td>
					<a href="{{ url('property/'.$prop->prop_id.'/edit') }}"><i class="fa fa-edit"></i></a>
					<a href="{{ url('property/'.$prop->prop_id.'/images') }}"><i class="fa fa-image"></i></a>
					<a href="{{ url('property/'.$prop->prop_id.'/delete') }}" class="btn-modal"><i class="fa fa-trash"></i></a>
					<a href="{{ url('property/'.$prop->prop_id.'/preview') }}" target=_blank><i class="fa fa-eye"></i></a>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		Total : {{ $props->total() }} record(s)
		{{ $props->links() }}
	</div>
</div>
@endsection
