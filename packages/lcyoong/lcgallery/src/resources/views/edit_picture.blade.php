{!! Form::open(['url'=>config('lcgallery.prefix') . 'gallery/pic/edit', 'method'=>'post', 'class'=>'form-submit form-horizontal']) !!}
    {!! Form::hidden('pic_id', $data->pic_id) !!}
    <div class="form-group">
    <div class="col-md-6">
      <img src="{{url('gallery-image/'.$data->pic_gallery.'/'.$data->pic_path)}}" class="img img-responsive full-width"/>
    </div>
    </div>
    <div class="form-group">
        {!! Form::label('pic_description', trans('lcgallery::picture.pic_description'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">{!! Form::text('pic_description', $data->pic_description, ['class'=>'form-control']) !!}</div>
    </div>
    <div class="form-group">
        {!! Form::label('pic_status', trans('lcgallery::picture.pic_status'), ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">{!! Form::select('pic_status', $dd_status, $data->pic_status, ['class'=>'form-control']) !!}</div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit(trans('form.button_submit'), ['class'=>'btn btn-default']) !!}
        </div>
    </div>
{!! Form::close() !!}
