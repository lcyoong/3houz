@if($unlocked)
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
    </div>
</div>
<br/>
<a class="sign_dof" prop_id="{{ $property->prop_id }}" href="{{ url('property/'.$property->prop_id.'/sign_offer') }}">{{ Form::button('<i class="fa fa-file-text-o"></i> ' . trans('property.sign_dof'), ['class'=>'btn btn-primary']) }}</a>
@else
<a class="unlock_property" prop_id="{{ $property->prop_id }}" href="{{ url('property/'.$property->prop_id.'/unlock') }}">{{ Form::button('<i class="fa fa-unlock-alt"></i> ' . trans('property.unlock'), ['class'=>'btn btn-primary']) }}</a>
@endif
