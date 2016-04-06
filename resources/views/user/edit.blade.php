@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('user.edit')</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('user/edit') }}">
                        {!! csrf_field() !!}
                        {{ Form::hidden('id', $user->id) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                {{ FormError::block($errors, 'name') }}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                {{ FormError::block($errors, 'email') }}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tel_no') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">@lang('user.tel_no')</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="tel_no" value="{{ $user->tel_no }}">
                                {{ FormError::block($errors, 'tel_no') }}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-save"></i>@lang('common.button_save')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
