{{ Form::open(['method'=>'get', 'url'=>url('/search'), 'class'=>'']) }}
<div class="row">
  <div class="col-md-3">
      <div class="form-group">
        {{ Form::text('search_project', '', ['class'=>'form-control ajax_project', 'placeholder'=> trans('general.search_project')]) }}
      </div>
  </div>
<div class="col-md-3">
    <div class="form-group">
      {{ Form::text('search_location', '', ['class'=>'form-control ajax_location', 'placeholder'=> trans('general.search_location')]) }}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        <!-- 0 {{ Form::text('search_price_range', '', ['class'=>'input-slider', 'data-slider-min'=>"0", 'data-slider-max'=>"10000000", 'data-slider-step'=>"100000", 'data-slider-value'=>"[100000,450000]", 'placeholder'=>trans('common.search_price_range')]) }} 10mil -->
      {{ Form::text('search_price_from', '', ['class'=>'form-control', 'placeholder'=> trans('general.search_price_from')]) }}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
      {{ Form::text('search_price_to', '', ['class'=>'form-control', 'placeholder'=> trans('general.search_price_to')]) }}
    </div>
</div>
<div class="col-md-2">
    <div class="form-group">
        {{ Form::button('<i class="fa fa-search"></i> ' . trans('general.button_search'), ['type'=>'submit', 'class'=>'form-control btn btn-primary']) }}
    </div>
</div>
</div>
{{ Form::close() }}
<div class="row">
    <div class="col-md-12">
      <div class="alert alert-success" role="alert">Note: 3HOUZ is currently limited to Klang Valley locations.</div>
    </div>
</div>
