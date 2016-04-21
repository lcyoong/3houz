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
        <a href="{{ url('/search') }}">Properties</a>
        <a href="#">{{ $property->project->prj_name }}</a>
    </div>
  </div>
  <header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="140" data-type="parallax" data-bg-image="assets/images/demo-content/agency-parallax.jpg" data-bg-image-mobile="assets/images/demo-content/agency-parallax.jpg" style="min-height: 140px; height: 140px; background-image: url(&quot;assets/images/demo-content/agency-parallax.jpg&quot;); background-position: 50% 50%;">
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
                          <a href="{{ url('search') }}" class="btn btn-default btn-transparent--border btn-hoverWhite ct-u-text--white">{{ trans('general.back_to_result') }}</a>
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
                              <!-- <div class="ct-js-googleMap ct-googleMap ct-js-googleMap--single" data-offset="1" data-location="{{ $property->project->prj_name }}" data-icon="assets/images/marker-house.png" data-zoom="14" data-height="260" id="map" style="min-height: 260px; position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">
                                <div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
                                  <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;">
                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 285px 130px 0px; transform: matrix(1, 0, 0, 1, 0, -1);">
                                      <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                          <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                            <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 80px; top: -183px;"></div>
                                            <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 80px; top: 73px;"></div>
                                            <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -176px; top: -183px;"></div>
                                            <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -176px; top: 73px;"></div>
                                            <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 336px; top: -183px;"></div>
                                            <div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 336px; top: 73px;"></div>
                                          </div>
                                        </div>
                                      </div>
                                      <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                      <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                      <div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                        <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                          <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                            <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 80px; top: -183px;">
                                              <canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas>
                                            </div>
                                            <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 80px; top: 73px;">
                                              <canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas>
                                            </div>
                                            <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -176px; top: -183px;"></div>
                                            <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -176px; top: 73px;"></div>
                                            <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 336px; top: -183px;"></div>
                                            <div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 336px; top: 73px;"></div>
                                          </div>
                                        </div>
                                      </div>
                                      <div style="position: absolute; z-index: 0; transform: translateZ(0px); left: 0px; top: 0px;">
                                        <div style="overflow: hidden;"></div>
                                      </div>
                                      <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                        <div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                          <div style="transform: translateZ(0px); position: absolute; left: 80px; top: -183px; transition: opacity 200ms ease-out;">
                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4667!3i6345!4i256!2m3!1e0!2sm!3i344010969!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjUwfHMuZTpsLml8cC52Om9mZixzLnQ6NHxwLnY6b2ZmLHMudDo2fHAuYzojZmY0MjVhNjh8cC52Om9u!4e0&amp;token=81178" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div>
                                            <div style="transform: translateZ(0px); position: absolute; left: 80px; top: 73px; transition: opacity 200ms ease-out;">
                                              <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4667!3i6346!4i256!2m3!1e0!2sm!3i344010957!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjUwfHMuZTpsLml8cC52Om9mZixzLnQ6NHxwLnY6b2ZmLHMudDo2fHAuYzojZmY0MjVhNjh8cC52Om9u!4e0&amp;token=76317" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -176px; top: -183px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4666!3i6345!4i256!2m3!1e0!2sm!3i344011089!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjUwfHMuZTpsLml8cC52Om9mZixzLnQ6NHxwLnY6b2ZmLHMudDo2fHAuYzojZmY0MjVhNjh8cC52Om9u!4e0&amp;token=122505" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: -176px; top: 73px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4666!3i6346!4i256!2m3!1e0!2sm!3i344011089!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjUwfHMuZTpsLml8cC52Om9mZixzLnQ6NHxwLnY6b2ZmLHMudDo2fHAuYzojZmY0MjVhNjh8cC52Om9u!4e0&amp;token=53669" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 336px; top: -183px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4668!3i6345!4i256!2m3!1e0!2sm!3i344010957!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjUwfHMuZTpsLml8cC52Om9mZixzLnQ6NHxwLnY6b2ZmLHMudDo2fHAuYzojZmY0MjVhNjh8cC52Om9u!4e0&amp;token=129320" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="transform: translateZ(0px); position: absolute; left: 336px; top: 73px; transition: opacity 200ms ease-out;"><img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i14!2i4668!3i6346!4i256!2m3!1e0!2sm!3i344010957!3m14!2sen-US!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjF8cy5lOmwudC5mfHAuYzojZmY0NDQ0NDQscy50OjV8cC5jOiNmZmYyZjJmMixzLnQ6MnxwLnY6b2ZmLHMudDozfHAuczotMTAwfHAubDo0NSxzLnQ6NDl8cC52OnNpbXBsaWZpZWQscy50OjUwfHMuZTpsLml8cC52Om9mZixzLnQ6NHxwLnY6b2ZmLHMudDo2fHAuYzojZmY0MjVhNjh8cC52Om9u!4e0&amp;token=60484" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%; transition-duration: 0.3s; opacity: 0; display: none;"><p class="gm-style-pbt">Use two fingers to move the map</p></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 285px 130px 0px; transform: matrix(1, 0, 0, 1, 0, -1);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"><div style="border: 0px none; position: absolute; left: 259.649px; top: 29.6117px;"></div></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=37.540657,-77.436048&amp;z=14&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 135px; top: 40px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2016 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 167px; bottom: 0px; width: 121px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span>Map data ©2016 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2016 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 95px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><div style="width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/sv5.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 112px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@37.5406565,-77.4360481,14z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div></div></div> -->
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
                                          <div class="ct-personBox text-left">
                                              <div class="ct-imagePerson">
                                                  <!-- <img src="assets/images/demo-content/agents-1.jpg" alt="">
                                                  <ul class="ct-panel--socials list-inline list-unstyled">
                                                      <li><a href="https://www.facebook.com/createITpl"><div class="ct-socials ct-socials--circle"><i class="fa fa-facebook"></i></div></a></li>
                                                      <li><a href="https://twitter.com/createitpl"><div class="ct-socials ct-socials--circle"><i class="fa fa-twitter"></i></div></a></li>
                                                      <li><a href="#"><div class="ct-socials ct-socials--circle"><i class="fa fa-instagram"></i></div></a></li>
                                                  </ul> -->
                                              </div>
                                              <div class="ct-personContent">
                                                  <div class="ct-personName ct-u-paddingBottom10 ct-u-marginBottom20">
                                                      <h5 class="ct-fw-600">{{ $owner->name }}</h5>
                                                      <!-- <a href="">15 Properties</a> -->
                                                  </div>
                                                  <div class="ct-personDescription  ct-u-paddingBottom10 ct-u-marginBottom20">
                                                      <ul class="list-unstyled ct-contactPerson">
                                                          <li>
                                                              <i class="fa fa-mobile"></i>
                                                              <span>{{ $owner->tel_no }}</span>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                  <div class="ct-personContact">
                                                      <div class="successMessage alert alert-success" style="display: none">
                                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                          Thank You!
                                                      </div>
                                                      <div class="errorMessage alert alert-danger" style="display: none">
                                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                          Ups! An error occured. Please try again later.
                                                      </div>
                                                      <form role="form" action="assets/form/send.php" method="post" class="contactForm validateIt" data-email-subject="Contact Form" data-show-errors="true">
                                                          <div class="form-group">
                                                              <div class="ct-form--item">
                                                                  <input id="contact_name" type="text" required="" class="form-control input-lg ct-u-marginBottom10" name="field[]" placeholder="Name">
                                                                  <input id="contact_email" type="email" required="" class="form-control input-lg ct-u-marginBottom10" name="field[]" placeholder="Email">
                                                                  <input id="contact_phone" type="tel" required="" class="form-control input-lg ct-u-marginBottom10" name="field[]" placeholder="Phone">
                                                                  <textarea id="contact_message" placeholder="Message" class="form-control input-lg" rows="4" name="field[]" required=""></textarea>
                                                              </div>
                                                              <button type="submit" class="btn btn-warning text-capitalize center-block">Send Message</button>
                                                          </div>
                                                      </form>
                                                  </div>
                                              </div>
                                          </div>
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
              $('#smallModal').modal('show');
              $('#smallModal').find('.modal-title').html(data.responseJSON);
              $('#smallModal').find('.modal-body').html(data.responseJSON);
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
              $('#smallModal').modal('show');
              $('#smallModal').find('.modal-title').html(data.responseJSON);
              $('#smallModal').find('.modal-body').html(data.responseJSON);
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

</script>

@endsection
