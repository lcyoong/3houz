{!! Form::open(['url'=>config('lcgallery.prefix') . 'gallery/add', 'method'=>'post', 'class'=>'form-submit form-horizontal', 'goto'=>url(config('lcgallery.prefix') . 'gallery/list/' . $owner)]) !!}
    {!! Form::hidden('gal_owner', $owner) !!}
    <div class="form-group">
        {!! Form::label('gal_name', trans('lcgallery::gallery.gal_name'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">{!! Form::text('gal_name', '', ['class'=>'form-control']) !!}</div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit(trans('form.button_submit'), ['class'=>'btn btn-default']) !!}
        </div>
    </div>
{!! Form::close() !!}