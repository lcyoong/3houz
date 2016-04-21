<footer>
    <div class="ct-footer--extended ct-u-paddingBoth60">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h4 class="text-uppercase ct-u-marginBottom30">About {{ config('3houz.brand') }}</h4>
                    <div class="ct-u-marginBottom30">
                        <span>Estato is new and powerfull real estate theme. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum nulla vel.</span>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h4 class="text-uppercase ct-u-marginBottom30">Contact us</h4>
                    <ul class="list-unstyled">
                        <li class="ct-u-marginBottom10">
                            <i class="fa fa-envelope-o"></i>
                            <span> <a href="mailto:{{ config('3houz.email') }}">{{ config('3houz.email') }}</a></span>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <span> {{ config('3houz.mobile') }}</span>
                        </li>
                    </ul>
                    <ul class="ct-panel--socials ct-panel--navbar list-inline list-unstyled ct-u-marginBottom30">
                        <li><a href="https://www.facebook.com/{{ config('3houz.facebook') }}" target=_blank><div class="ct-socials ct-socials--circle"><i class="fa fa-facebook"></i></div></a></li>
                        <li><a href="https://twitter.com/{{ config('3houz.facebook') }}" target=_blank><div class="ct-socials ct-socials--circle"><i class="fa fa-twitter"></i></div></a></li>
                        <li><a href="http://instagram.com/{{ config('3houz.instagram') }}" target=_blank><div class="ct-socials ct-socials--circle"><i class="fa fa-instagram"></i></div></a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h4 class="text-uppercase ct-u-marginBottom30">Quick links</h4>
                    <div class="row">
                        <div class="ct-links">
                            <div class="col-md-6">
                              <a class="text-capitalize" href="{{ url('/') }}">Home</a>
                              <a class="text-capitalize" href="{{ url('contact') }}">Contact Us</a>
                            </div>
                            <div class="col-md-6">
                              <a class="text-capitalize" href="{{ url('login') }}">Login</a>
                              <a class="text-capitalize" href="{{ url('register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ct-postFooter ct-u-paddingBoth20">
        <a href="#" class="ct-scrollUpButton ct-js-btnScrollUp">
           <span class="ct-sectioButton--square">
               <i class="fa fa-angle-double-up"></i>
           </span>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-sm-push-6">
                    <div class="ct-newsletter text-right">
                        <span class="text-uppercase ct-u-text--white ct-fw-600">Join our newsletter</span>
                        <input id="newsletter" placeholder="Your E-mail Address" required type="text" name="field[]" class="form-control input-lg">
                        <button type="submit" class="btn btn-primary btn-transparent--border ct-u-text--motive text-capitalize">Subscribe</button>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-sm-pull-6">
                    <span class="ct-copyright">&copy; {{ date('Y') }} {{ config('3houz.brand') }}. All rights reserved. We accept:  </span>
                    <ul class="icons list-unstyled list-inline">
                        <li>
                            <i class="fa fa-cc-stripe" data-toggle="tooltip" data-placement="top" title="Stripe"></i>
                        </li>
                        <li>
                            <i class="fa fa-cc-paypal" data-toggle="tooltip" data-placement="top" title="PayPal"></i>
                        </li>
                        <li>
                            <i class="fa fa-cc-mastercard" data-toggle="tooltip" data-placement="top" title="Mastercard"></i>
                        </li>
                        <li>
                            <i class="fa fa-cc-visa" data-toggle="tooltip" data-placement="top" title="Visa"></i>
                        </li>
                        <li>
                            <i class="fa fa-cc-discover" data-toggle="tooltip" data-placement="top" title="Discover"></i>
                        </li>
                        <li>
                            <i class="fa fa-cc-amex" data-toggle="tooltip" data-placement="top" title="Amex"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
