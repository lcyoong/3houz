<div class="ct-js-sidebar">
      <div class="row">
          <div class="col-sm-6 col-md-12">
              <div class="widget">
                  <div class="widget-inner">
                    {{ Form::open(['method'=>'get', 'url'=>url('/search'), 'class'=>'ct-formSearch--extended', 'role'=>'form']) }}
                        <div class="ct-form--label--type3">
                            <div class="ct-u-displayTableVertical">
                                <div class="ct-u-displayTableCell">
                                    <div class="ct-input-group-btn">
                                        <button class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="ct-u-displayTableCell text-center">
                                    <span class="text-uppercase">{{ trans('general.title_search_sidebar') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <!-- <div class="ct-form--item ct-u-marginBoth10">
                                <label>{{ trans('property.prop_id') }}</label>
                                {{ Form::text('search_id', '', ['class'=>'form-control input-lg']) }}
                            </div> -->
                            <div class="ct-form--item ct-u-marginBottom10">
                                <label>{{ trans('property.prop_location') }}</label>
                                {{ Form::text('search_location', array_get($search_cache, 'search_location'), ['class'=>'form-control ajax_location']) }}
                                <!-- {{ Form::select('search_location', $postcode, array_get($search_cache, 'search_location'), ['class' => 'select2 ct-select-lg']) }} -->
                            </div>
                            <div class="ct-form--item ct-u-marginBottom10">
                                <label>{{ trans('property.prop_type') }}</label>
                                {{ Form::select('search_type', $type, array_get($search_cache, 'search_type'), ['class' => 'select2 ct-select-lg']) }}
                            </div>
                            <div class="ct-form--item ct-u-marginBoth10">
                                <label>{{ trans('general.search_price_from') }}</label>
                                {{ Form::text('search_price_from', array_get($search_cache, 'search_price_from'), ['class'=>'form-control input-lg']) }}
                            </div>
                            <div class="ct-form--item ct-u-marginBoth10">
                                <label>{{ trans('general.search_price_to') }}</label>
                                {{ Form::text('search_price_to', array_get($search_cache, 'search_price_to'), ['class'=>'form-control input-lg']) }}
                            </div>
                            <!-- <div class="ct-u-displayTableCell">
                                <input type="text" class="slider ct-js-sliderTicks" value="" data-slider-handle="square" data-slider-min="100" data-slider-max="10000" data-slider-step="10" data-slider-value="[100,10000]"/>
                                <label class="text-center center-block">{{ trans('property.prop_built_up') }}</label>
                            </div> -->
                            <button type="submit" class="btn btn-warning ct-u-marginTop10">Search or Filter Now</button>
                        </div>
                      {{ Form::close() }}
                  </div>
              </div>
          </div>    </div></div>