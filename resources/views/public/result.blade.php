@extends('layouts.public.page')

@section('page_content')
<div class="ct-site--map">
    <div class="container">
        <a href="{{ url('/') }}">{{ trans('general.menu_home') }}</a>
        <a href="#">{{ trans('general.title_search_result') }}</a>
    </div>
</div>
<div class="container ct-u-paddingTop20">
  <div class="ct-section--products ct-u-paddingTop20">
    <div class="row">
      <div class="col-md-4 col-lg-3">
        @include('partials.public.side_search')
      </div>
      <div class="col-md-8 col-lg-9">
      <div class="ct-sortingBar ct-u-paddingRight10 ct-u-paddingLeft10 ct-u-marginBottom30">
          <div class="ct-sortingTitle pull-left">
              <h4 class="text-uppercase">{{ trans('general.title_search_result') }} <span>({{ $result->total() }})</span></h4>
              <aside class="sorting">
                  <span>Sorting</span>
                  <div class="form-group">
                    {!! Form::open(['url'=>url('sort-search'), 'method'=>'post', 'id'=>'sort-form']) !!}
                    {!! Form::select('sort_search', $dd_sort, $sort_search, ['class'=>'form-control sort_search', 'goto'=>url('sort-search')]); !!}
                    {!! Form::close() !!}
                  </div>
                  <!-- /.form-group -->
              </aside>

          </div>
          <ul class="ct-showPages list-inline list-unstyled pull-right ct-u-paddingBoth15">
              <li class="ct-showElements is-active" id="ct-js-showTiles">
                  <a href="#">
                      <i class="fa fa-th fa-fw"></i>
                  </a>
              </li>
              <li class="ct-showElements" id="ct-js-showList">
                  <a href="#">
                      <i class="fa fa-th-list fa-fw"></i>
                  </a>
              </li>
          </ul>
          <div class="clearfix"></div>
      </div>
      <div class="row ct-js-search-results ct-showProducts--default">
        @foreach($result as $result_item)
        <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="ct-itemProducts ct-u-marginBottom30 ct-hover">
                <label class="control-label sale">
                    {{ $result_item->prop_tenure }}
                </label>
                <a href="{{ url('property_detail/' . $result_item->prop_id) }}">
                    <div class="ct-main-content">
                        <div class="ct-imageBox">
                            @if(!is_null($result_item->pic_thumbnail_path))
                            <img src="{{ url('property-pic/' . $result_item->pic_thumbnail_path) }}"><i class="fa fa-eye"></i>
                            @else
                            <img src="{{ url('property-pic/default.jpg') }}"><i class="fa fa-eye"></i>
                            @endif
                        </div>
                        <div class="ct-main-text">
                            <div class="ct-product--tilte">
                                {{ $result_item->prj_name }}
                            </div>
                            {{ $result_item->prop_location }}
                            <div class="ct-product--price">
                                <span>${{ number_format($result_item->prop_price) }}</span>
                            </div>
                            <div class="ct-product--description">

                            </div>
                        </div>
                    </div>
                    <div class="ct-product--meta">
                        <div class="ct-icons">
                            <span>
                                <i class="fa fa-bed"></i> {{ $result_item->prop_no_bedrooms }}
                            </span>
                            <span>
                                <i class="fa fa-cutlery"></i> {{ $result_item->prop_no_bathrooms }}
                            </span>
                        </div>
                        <div class="ct-text">
                            <span> Area: <span>{{ $result_item->prop_built_up }} sqf</span></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix visible-sm"></div>
        @endforeach
    </div>

    {!! $result->render() !!}
    <!-- <div class="ct-pagination text-center">


      <ul class="pagination">
          <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
      </ul>
    </div> -->
    </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
$(document).ready(function () {
  $('body').on('change', '.sort_search', function (event) {
      event.preventDefault();
      // var ref = true;
      // var goto = $(this).attr('goto');
      $.ajax({
          url : $(this).attr('goto'),
          type: 'POST',
          dataType: 'json',
          data: $('#sort-form').serialize(),
          // headers: { 'csrftoken' : $('input[name="_token"]').val() },
          // header: {'X-CSRF-Token': $('input[name="_token"]').val()},
          success: function (data) {
              $('#smallModal').modal('show');
              $('#smallModal').find('.modal-title').html(data.title);
              $('#smallModal').find('.modal-body').html(data.message);
              setTimeout(function () {
                location.reload();
              }, 2000);
          },
          error: function(data){
              $('#smallModal').modal('show');
              $('#smallModal').find('.modal-title').html(data.responseJSON.title);
              $('#smallModal').find('.modal-body').html(data.responseJSON.message);
          }
      });

      return false;
  });
});
</script>
@endsection
