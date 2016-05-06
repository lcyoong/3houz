@extends('layouts.public.page')

@section('css')
<style type="text/css">
    #map {
      width: 100%;
      height: 300px;
    }
  </style>
@endsection

@section('page_content')
  <div class="ct-site--map">
    <div class="container">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/search?' . $query_str) }}">Properties</a>
        <a href="#">{{ $property->project->prj_name }}</a>
    </div>
  </div>
  <header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="140" data-type="parallax" data-bg-image="" data-bg-image-mobile="" style="min-height: 140px; height: 140px; background-position: 50% 50%;">
      <div class="ct-mediaSection-inner">
          <div class="container">
              <div class="ct-u-displayTableVertical">
                  <div class="ct-textBox ct-u-text--white ct-u-displayTableCell text-left">
                      <h2 class="text-uppercase">{{ $property->project->prj_name }}</h2>
                      <h4 class="text-uppercase">{{ $property->prop_location }}</h4>
                      <span class="ct-productID ct-fw-600">
                          Property ID: {{ $property->prop_id }}
                      </span>
                  </div>
                  <div class="ct-u-displayTableCell text-right">
                      {{ Form::open(['url'=> '/', 'method'=>'post', 'id'=>'fav-form']) }}
                      <a id="my_favourite" class="add_to_fav btn btn-sm btn-default btn-transparent--border btn-hoverWhite ct-u-text--white" href="{{ url('property/' . $property->prop_id . '/add_to_fav') }}"><i class="fa fa-heart-o"></i></a>
                      <a class="btn btn-sm btn-default btn-transparent--border btn-hoverWhite ct-u-text--white" href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" target=_blank><i class="fa fa-facebook"></i></a>
                      <a class="btn btn-sm btn-default btn-transparent--border btn-hoverWhite ct-u-text--white" href="http://twitter.com/home?status={{ Request::url() }}" target=_blank><i class="fa fa-twitter"></i></a>
                      <!-- <a href="javascript:window.print()" class="btn btn-sm btn-default btn-transparent--border btn-hoverWhite ct-u-text--white"><i class="fa fa-print"></i></a> -->
                      <div class="ct-buttonBox">
                          <a href="{{ url('search?' . $query_str) }}" class="btn btn-default btn-transparent--border btn-hoverWhite ct-u-text--white">{{ trans('general.back_to_result') }}</a>
                      </div>
                      {{ Form::close() }}
                  </div>
              </div>
          </div>
      </div>
  </header>

  <section class="ct-u-paddingBottom60">
      <div class="container">
          <div class="ct-productMeta--single text-uppercase">
              <div class="row">
                  <div class="col-md-8 col-lg-9">
                      <div class="ct-u-displayTableVertical">
                          <div class="ct-u-displayTableCell text-left">
                              <i class="fa fa-calendar"></i><h6>published on {{ $property->created_at }}</h6>
                          </div>
                          <div class="ct-u-displayTableCell text-left">
                              <i class="fa fa-pencil-square-o"></i><h6>updated on {{ $property->updated_at }}</h6>
                          </div>
                          <div class="ct-u-displayTableCell text-right">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-3 text-right">
                      <!-- <a href=""><i class="fa fa-times"></i>report abuse</a> -->
                  </div>
              </div>
          </div>
          <div class="ct-section--products">
              <div class="row">
                  <div class="col-md-8 col-lg-9">
                      <div class="ct-gallery ct-u-marginBottom30">
                        <div class="ct-owl-controls--type2" data-single="true" data-pagination="false" data-navigation="false" data-snap-ignore="true" id="sync1">
                          @foreach($pics as $pic)
                            <div class="item"><img src="{{ url('property-pic/' . $pic->pic_path) }}"></div>
                          @endforeach
                        </div>
                        <div class="ct-navigationThumbnail">
                            <div class="ct-owl-controls--type3" data-single="false" data-items="5" data-pagination="false" data-snap-ignore="true" id="sync2">
                              @foreach($pics as $pic)
                                <div class="item"><img src="{{ url('property-pic/' . $pic->pic_thumbnail_path) }}"></div>
                              @endforeach
                            </div>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                              <div class="ct-heading ct-u-marginBottom20">
                                  <h3 class="text-uppercase">Summary</h3>
                              </div>
                              <div class="ct-u-displayTableVertical ct-productDetails">
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Price</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span class="ct-price">$ {{ number_format($property->prop_price) }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Area</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_built_up }} sqf</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Status</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_status }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Type</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prty_description }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Location</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_location }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">{{ trans('property.prop_furnishing') }}</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_furnishing }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">{{ trans('property.prop_tenure') }}</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_tenure }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Beds</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_no_bedrooms }}</span>
                                      </div>
                                  </div>
                                  <div class="ct-u-displayTableRow">
                                      <div class="ct-u-displayTableCell">
                                          <span class="ct-fw-600">Baths</span>
                                      </div>
                                      <div class="ct-u-displayTableCell text-right">
                                          <span>{{ $property->prop_no_bathrooms }}</span>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-md-8">
                              <div class="ct-heading ct-u-marginBottom20">
                                  <h3 class="text-uppercase">Description</h3>
                              </div>
                              <p class="ct-u-marginBottom20">
                                  {!! nl2br($property->prop_description) !!}
                              </p>
                              <!-- <div class="ct-heading ct-u-marginBottom20">
                                  <h3 class="text-uppercase">Property Details</h3>
                              </div>
                              <div class="ct-u-displayTableVertical ct-productDetails--type2 ct-u-marginBottom20">
                                  <div class="ct-u-displayTableCell">
                                      <ul class="list-unstyled">
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span class="text-capitalize">air conditioning</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span class="text-capitalize">ADSL cable</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span class="text-capitalize">WiFi</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-times-circle negative"></i>
                                              <span class="text-capitalize">HiFi audio</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span class="text-capitalize">fridge</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span class="text-capitalize">grill</span>
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="ct-u-displayTableCell">
                                      <ul class="list-unstyled">
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span class="text-capitalize">Full HD TV</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-times-circle negative"></i>
                                              <span class="text-capitalize">Digital antenna</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-check-circle"></i>
                                              <span>Kitchen with Island</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-times-circle negative"></i>
                                              <span class="text-capitalize">exotic garden</span>
                                          </li>
                                          <li>
                                              <i class="fa fa-times-circle negative"></i>
                                              <span class="text-capitalize">guest house</span>
                                          </li>
                                      </ul>
                                  </div>
                              </div> -->
                              <div class="ct-heading ct-u-marginBottom20">
                                  <h3 class="text-uppercase">Map</h3>
                              </div>
                              <div id="location_disclaimer"></div>
                              <div id="map"></div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-3">
                      <div class="ct-js-sidebar">
                          <div class="row">
                              <!-- <div class="col-sm-6 col-md-12">
                                  <div class="widget ct-widget--calculator">
                                      <div class="widget-inner">
                                          <form role="form" class="ct-form--darkStyle">
                                              <div class="form-group">
                                                  <div class="ct-form--label--type2">
                                                      <div class="ct-u-displayTableVertical">
                                                          <div class="ct-u-displayTableCell">
                                                              <div class="ct-input-group-btn">
                                                                  <button class="btn btn-primary">
                                                                      <i class="fa fa-calculator"></i>
                                                                  </button>
                                                              </div>
                                                          </div>
                                                          <div class="ct-u-displayTableCell text-center">
                                                              <span class="text-uppercase">Calculate Loan</span>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="ct-form--item">
                                                      <label>Property Price ($)</label>
                                                      <input type="text" required="" class="form-control input-lg" placeholder="Any">
                                                  </div>
                                                  <div class="ct-form--item">
                                                      <label>Procent Down</label>
                                                      <input type="text" required="" class="form-control input-lg" placeholder="Any">
                                                  </div>
                                                  <div class="ct-form--item">
                                                      <label>Term (Years)</label>
                                                      <input type="text" required="" class="form-control input-lg" placeholder="Any">
                                                  </div>
                                                  <div class="ct-form--item">
                                                      <label>Interest Rate in %</label>
                                                      <input type="text" required="" class="form-control input-lg" placeholder="Any">
                                                  </div>
                                                  <div class="ct-form--item last">
                                                      <button type="submit" class="btn btn-warning">Calculate My Mortgage</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </div> -->
                              <div class="col-sm-6 col-md-12">
                                  <div class="widget">
                                      <div class="widget-inner">
                                          <h4 class="text-uppercase">{{ trans('general.contact_owner') }}</h4>
                                          <div id="owner_detail"></div>
                                          <ul class="instruction">
                                            <li><span class="label label-info">Step 1</span> Unlock owner's contact.</li>
                                            <li><span class="label label-info">Step 2</span> Contact owner and negotiate the deal.</li>
                                            <li><span class="label label-info">Step 3</span> When you are ready to make an offer, get the <a href="#" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Offer Key (OK) is a passcode provided by the owner to enable buyer to make an offer on each property."><u>Offer Key (OK)</u></a> from the owner to complete the digital offer form (DOF). Our panel lawyer will contact you for the rest of the proceeding.</li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection

@section('css')
@endsection

@section('js')
<script type="text/javascript" src="{{ URL::asset('js/owl/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('js/owl/init.js')}}"></script>
<script src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="{{ URL::asset('js/gmaps.min.js')}}"></script>
<script>
$(document).ready(function () {

  map = new GMaps({
      div: '#map',
      lat: 0,
      lng: 0
  });

  GMaps.geocode({
    address: "{{ $property->project->prj_name }}, {{ $property->prop_location }}",
    callback: function(results, status){
      if(status=='OK'){
        var latlng = results[0].geometry.location;
        map.setCenter(latlng.lat(), latlng.lng());
        map.addMarker({
          lat: latlng.lat(),
          lng: latlng.lng()
        });
      }
      if(status=='ZERO_RESULTS'){
        GMaps.geocode({
          address: "{{ $property->prop_location }}",
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              $('#location_disclaimer').html('<i class="fa fa-exclamation-circle"><i> Property cannot be located. Showing location/township on map.');
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
                lat: latlng.lat(),
                lng: latlng.lng()
              });
            }
          }
        });

      }
    }
  });

  checkFav();
  getOwnerDetail();

  $('body').on('click', '.add_to_fav', function (event) {
      event.preventDefault();
      var user = @if(auth()->check()) {{auth()->user()->id}} @else 0 @endif;
      // var ref = true;
      // var goto = $(this).attr('goto');
      $.ajax({
          url : $(this).attr('href'),
          type: 'POST',
          dataType: 'json',
          // data: $('#fav-form').serialize(),
          data: {fav_owner: user, fav_property: {{$property->prop_id}}, _token: "{{ csrf_token() }}"},
          success: function (data) {
              checkFav();
          },
          error: function(data){
              console.log(data.responseJSON);
              $('#basicModal').find('.modal-content').html('');
              $('#basicModal').modal('show');
              $('#basicModal').find('.modal-content').html(data.responseText);
          }
      });

      return false;
  });

  $('body').on('click', '.remove_fav', function (event) {
      event.preventDefault();
      // var ref = true;
      // var goto = $(this).attr('goto');
      $.ajax({
          url : $(this).attr('href'),
          type: 'POST',
          dataType: 'json',
          // data: $('#fav-form').serialize(),
          data: {fav_id: $(this).attr('favid'), _token: "{{ csrf_token() }}"},
          success: function (data) {
              checkFav();
              // $('#smallModal').modal('show');
              // $('#smallModal').find('.modal-title').html(data.title);
              // $('#smallModal').find('.modal-body').html(data.message);
              // setTimeout(function () {
              //   location.reload();
              // }, 2000);
          },
          error: function(data){
              console.log(data.responseJSON);
              $('#basicModal').find('.modal-content').html('');
              $('#basicModal').modal('show');
              $('#basicModal').find('.modal-content').html(data.responseText);
          }
      });


      return false;
  });

  $('body').on('click', '.unlock_property', function (event) {
      event.preventDefault();
      // var ref = true;
      // var goto = $(this).attr('goto');
      $.ajax({
          url : $(this).attr('href'),
          type: 'POST',
          dataType: 'json',
          // data: $('#fav-form').serialize(),
          data: {prop_id: $(this).attr('prop_id'), _token: "{{ csrf_token() }}"},
          success: function (data) {
            // $('#owner_detail').hide().fadeIn('slow');
            getOwnerDetail();
          },
          error: function(data){
              // console.log(data.responseJSON);
              $('#basicModal').find('.modal-content').html('');
              $('#basicModal').modal('show');
              $('#basicModal').find('.modal-content').html(data.responseText);
          }
      });


      return false;
  });

});


function checkFav()
{
  $.ajax({
      url: "{{ url('/is_favourite/' . $property->prop_id) }}",
      type: 'GET',
    }).done(function( data ) {
      if (data.fav_id) {
        $('#my_favourite').html('<i class="fa fa-heart"></i>');
        $('#my_favourite').addClass('fav_heart');
        $('#my_favourite').attr('href', "{{ url('property/' . $property->prop_id . '/remove_fav') }}");
        $('#my_favourite').addClass('remove_fav');
        $('#my_favourite').removeClass('add_to_fav');
        $('#my_favourite').attr('favid', data.fav_id);
      } else {
        $('#my_favourite').html('<i class="fa fa-heart-o"></i>');
        $('#my_favourite').removeClass('fav_heart');
        $('#my_favourite').attr('href', "{{ url('property/' . $property->prop_id . '/add_to_fav') }}");
        $('#my_favourite').removeClass('remove_fav');
        $('#my_favourite').addClass('add_to_fav');
      }
  });

}

function getOwnerDetail()
{
  $.ajax({
      url: "{{ url('/property/' . $property->prop_id . '/owner') }}",
      type: 'GET',
    }).done(function( data ) {
      $('#owner_detail').html(data);
  });

}

</script>

@endsection
