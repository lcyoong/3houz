{{ Form::open(['action'=>'get', 'url'=>url('/search'), 'class'=>'ct-searchFormMobile ct-u-marginBottom50', 'role'=>'form']) }}
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
                    <label>Property id</label>
                    <input type="text" required class="form-control input-lg" placeholder="Any">
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                    <label>Location</label>
                    <select class="ct-js-select ct-select-lg">
                        <option value="any">Any</option>
                        <option value="1">New York</option>
                        <option value="2">New Jersey</option>
                        <option value="3">Newark</option>
                        <option value="4">Philadelphia</option>
                    </select>
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                    <label>Property type </label>
                    <select class="ct-js-select ct-select-lg">
                        <option value="any">Any</option>
                        <option value="1">Houses</option>
                        <option value="2">Industrial</option>
                        <option value="3">Retail</option>
                        <option value="4">Apartments</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="ct-u-displayTableVertical ct-slider--row">
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                    <label>Bedrooms</label>
                    <select class="ct-js-select ct-select-lg">
                        <option value="any">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3+</option>
                    </select>
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <div class="ct-form--item">
                    <label>Bathrooms</label>
                    <select class="ct-js-select ct-select-lg">
                        <option value="any">Any</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3+</option>
                    </select>
                </div>
            </div>
            <div class="ct-u-displayTableCell">
                <input type="text" class="slider ct-js-sliderTicks" value="" data-slider-handle="square" data-slider-min="0" data-slider-max="200" data-slider-step="20" data-slider-value="[60,120]"/>
                <label class="text-center center-block">Area (m2)</label>
            </div>
            <div class="ct-u-displayTableCell">
                <button type="submit" class="btn btn-warning text-capitalize pull-right">search now</button>
            </div>
        </div>
    </div>
{{ Form::close() }}
