@extends('layouts.public.page')

@section('page_content')
<header class="ct-mediaSection" data-stellar-background-ratio="0.3" data-height="140" data-type="parallax" data-bg-image="assets/images/demo-content/agency-parallax.jpg" data-bg-image-mobile="assets/images/demo-content/agency-parallax.jpg">
    <div class="ct-mediaSection-inner">
        <div class="container">
            <div class="ct-heading--main text-center">
                <h3 class="text-uppercase ct-u-text--white">Frequently Asked Questions</h3>
            </div>
        </div>
    </div>
</header>
<section class="ct-u-paddingBoth60">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="ct-navigation nav ct-js-navigation text-capitalize">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a class="ct-js-btnScroll" href="#one">Registration</a></li>
                        <li><a class="ct-js-btnScroll" href="#two">General Terms</a></li>
                        <li><a class="ct-js-btnScroll" href="#three">Data Handling</a></li>
                        <li><a class="ct-js-btnScroll" href="#four"> Fees</a></li>
                        <li><a class="ct-js-btnScroll" href="#five">Miscellaneous</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="ct-heading ct-u-marginBottom10">
                    <h3 class="text-uppercase" id="one">Registration</h3>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is 3houz?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                3houz is an online platform where anyone can Buy and Sell their property directly online. Where Owner meets Buyers Directly.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What is 3houz’s mission?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                We aim to build a trusted and safe marketplace for owners and buyers to deal directly.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    How do I know if that is a real owner who owns the property?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                Currently we are in beta version. We are going to introduce features where Owner can be verified as premium user by 3houz.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Phasellus congue lacus eget?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ct-heading ct-u-marginBottom10">
                    <h3 class="text-uppercase" id="two">General Terms</h3>
                </div>
                <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                    Lorem ipsum dolor sit amet?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                    Ipsum dolor sit?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour2" aria-expanded="false" aria-controls="collapseFour2">
                                    Phasellus congue lacus eget?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive2" aria-expanded="false" aria-controls="collapseFive2">
                                    Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix2" aria-expanded="false" aria-controls="collapseSix2">
                                    Lorem ipsum dolor sit amet?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven2" aria-expanded="false" aria-controls="collapseSeven2">
                                    Ipsum dolor sit?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingEight2">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseEight2" aria-expanded="false" aria-controls="collapseEight2">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight2">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ct-heading ct-u-marginBottom10">
                    <h3 class="text-uppercase" id="three">Data Handling</h3>
                </div>
                <div class="panel-group" id="accordion3" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne3">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseOne3" aria-expanded="true" aria-controls="collapseOne3">
                                    Lorem ipsum dolor sit amet?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne3">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo3">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo3">
                                    Ipsum dolor sit?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo3">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree3">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree3">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ct-heading ct-u-marginBottom10">
                    <h3 class="text-uppercase" id="four">Fees</h3>
                </div>
                <div class="panel-group" id="accordion4" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseOne4" aria-expanded="true" aria-controls="collapseOne4">
                                    Lorem ipsum dolor sit amet?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo4">
                                    Ipsum dolor sit?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseThree4" aria-expanded="false" aria-controls="collapseThree4">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                    Phasellus congue lacus eget?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseFive4" aria-expanded="false" aria-controls="collapseFive4">
                                    Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseSix4" aria-expanded="false" aria-controls="collapseSix4">
                                    Lorem ipsum dolor sit amet?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseSeven4" aria-expanded="false" aria-controls="collapseSeven4">
                                    Ipsum dolor sit?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingEight4">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion4" href="#collapseEight4" aria-expanded="false" aria-controls="collapseEight4">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight4">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ct-heading ct-u-marginBottom10">
                    <h3 class="text-uppercase" id="five">Miscellaneous</h3>
                </div>
                <div class="panel-group" id="accordion5" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne5">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion5" href="#collapseOne5" aria-expanded="true" aria-controls="collapseOne5">
                                    Lorem ipsum dolor sit amet?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne5">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo5">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion5" href="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo5">
                                    Ipsum dolor sit?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo5">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree5">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion5" href="#collapseThree5" aria-expanded="false" aria-controls="collapseThree5">
                                    Etiam sit amet lectus quis est congue mollis?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree5">
                            <div class="panel-body">
                                Yes, lorem ipsum dolor sit amet, consectetur adipisicing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
