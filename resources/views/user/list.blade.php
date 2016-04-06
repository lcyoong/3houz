@extends('layouts.list')
@section('content_list')
<div class="row">
	<div class="col-md-12">		
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<td>{{ trans('user.id') }}</td>
					<td>{{ trans('user.name') }}</td>
					<td>{{ trans('user.email') }}</td>
					<td>{{ trans('user.tel_no') }}</td>
					<td>{{ trans('menu.action_column') }}</td>
				</tr>
			</thead>
			<tbody>
			@foreach ($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->tel_no }}</td>
				<td>
					<a href="{{ url('user/'.$user->id.'/edit') }}"><i class="fa fa-edit"></i></a>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $users->links() }}
	</div>
</div>
@endsection
