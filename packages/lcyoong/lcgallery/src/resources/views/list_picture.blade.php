<div class="row">
    <div class="col-md-3">
        <div>
        {{trans('lcgallery::gallery.gal_name')}}<br/>
        <span class="label label-default">{{$gallery->gal_name}}</span>
        </div>
        <p></p>
        {!! Form::open(['url'=>config('lcgallery.prefix') . 'gallery/pic/add', 'method'=>'post', 'class'=>'dropzone dropzoneme dz-clickable form-submit']) !!}
        {!! Form::hidden('pic_gallery', $gallery->gal_id) !!}
        <h4>Add new categories here</h4>
        <h4>Drag Photos to Upload</h4>
        <span>Or click to browse</span>
        {!! Form::close()!!}
    </div>
    <div class="col-md-9">
    	<div class="row">
        <h4>Pictures ({{$datas->total()}})</h4>
            @foreach($datas as $item)
            <div class="col-lg-2 col-md-4 col-xs-6">
		              <a href="{{url($uprefix . 'gallery/pic/edit/' . $item->pic_id)}}" class="pop-form thumbnail">
		              <div class="imagex">
                  <img src="{{url('gallery-image/'.$item->pic_gallery.'/'.$item->pic_path)}}" class="img img-responsive full-width" alt="{{$item->pic_description}}" title="{{$item->pic_description}}"/>
                  </div>
                  </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
