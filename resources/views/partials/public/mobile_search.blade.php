{{ Form::open(['method'=>'get', 'url'=>url('/search'), 'class'=>'ct-searchFormMobile ct-u-marginBottom50', 'role'=>'form']) }}
    <div class="form-group ">
        <div class="ct-form--label--type1">
            <div class="ct-u-displayTableVertical">
                <div class="ct-u-displayTableCell">
                    <div class="ct-input-group-btn">
                        <button class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="ct-u-displayTableCell text-center">
                    <span class="text-uppercase">Search for property</span>
                </div>
            </div>
        </div>
        <div class="ct-u-displayTableVertical ct-u-marginBottom20">
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                    <label>{{ trans('property.prop_location') }}</label>
                    {{ Form::text('search_location', array_get($search_cache, 'search_location'), ['class'=>'form-control mobile_ajax_location', 'placeholder'=> trans('general.search_location')]) }}
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                    <label>{{ trans('property.search_project') }}</label>
                    {{ Form::text('search_project', array_get($search_cache, 'search_project'), ['class'=>'form-control mobile_ajax_project', 'placeholder'=> trans('general.search_project')]) }}
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                  <label>{{ trans('property.prop_type') }}</label>
                  {{ Form::select('search_type', $type, array_get($search_cache, 'search_type'), ['class' => 'select2 ct-select-lg']) }}
                </div>
            </div>
            <div class="ct-form--item ct-u-marginBoth10">
                <label>{{ trans('general.search_price_from') }}</label>
                {{ Form::text('search_price_from', array_get($search_cache, 'search_price_from'), ['class'=>'form-control input-lg']) }}
            </div>
            <div class="ct-form--item ct-u-marginBoth10">
                <label>{{ trans('general.search_price_to') }}</label>
                {{ Form::text('search_price_to', array_get($search_cache, 'search_price_to'), ['class'=>'form-control input-lg']) }}
            </div>
        </div>
        <div class="ct-u-displayTableVertical ct-slider--row">
            <div class="ct-u-displayTableCell">
                <button type="submit" class="btn btn-warning ct-u-marginTop10">{{ trans('general.button_search') }}</button>
            </div>
        </div>
    </div>
{{ Form::close() }}
