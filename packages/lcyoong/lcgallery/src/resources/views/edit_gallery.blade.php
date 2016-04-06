{!! Form::open(['url'=>config('lcgallery.prefix') . 'gallery/edit', 'method'=>'post', 'class'=>'form-submit form-horizontal', 'files'=>true]) !!}
    {!! Form::hidden('gal_owner', $data->gal_owner) !!}
    {!! Form::hidden('gal_id', $data->gal_id) !!}
    <div class="form-group">
        {!! Form::label('gal_name', trans('lcgallery::gallery.gal_name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">{!! Form::text('gal_name', $data->gal_name, ['class'=>'form-control']) !!}</div>
    </div>
    <div class="form-group">
        {!! Form::label('gal_status', trans('lcgallery::gallery.gal_status'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">{!! Form::select('gal_status', $dd_status, $data->gal_status, ['class'=>'form-control']) !!}</div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit(trans('form.button_submit'), ['class'=>'btn btn-default']) !!}
        </div>
    </div>
{!! Form::close() !!}