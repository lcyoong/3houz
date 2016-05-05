<div>
  <div class="progress">
    <div class="progress-bar progress-bar-success progress-bar-striped" style="width: 40%">
      <a href="{{ url('property/' . $prop->prop_id . '/edit') }}"><i class="fa fa-check"></i> Property created<span class="sr-only">Created property</span></a>
    </div>
    <div class="progress-bar @if($progress['pic']) progress-bar-success @else progress-bar-warning @endif progress-bar-striped" style="width: 30%">
      <a href="{{ url('property/' . $prop->prop_id . '/images') }}">@if($progress['pic']) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i>  @endif Add pictures<span class="sr-only">Add pictures</span></a>
    </div>
    <div class="progress-bar @if($progress['verify']) progress-bar-success @else progress-bar-warning @endif progress-bar-striped" style="width: 30%">
      <a href="#" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Please email the front page of your property's Sales &amp; Purchase Agreement (SPA) to team@3houz.com to be verified">@if($progress['verify']) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i>  @endif Verify property<span class="sr-only">Verify property</span></a>
    </div>
  </div>
</div>
