@extends('template.front.1column-home')

@section('body_class') about @endsection

@section('content')
    <div class="container" ng-app="cypher_app">
        @include('template.front.pages.layout')
        <div class="row">
            <div class="col-xs-12">

                <div class="well bs-component"
                     style="padding: 0;
                             margin-bottom: 0;
                             background: url('/front/images/about/about-banner-1-friendship.jpg') no-repeat bottom center;
                             height: 500px;
                             background-size: cover">
                </div>

                <div class="well bs-component" style="padding-top: 10px;">

                    <h1 style="margin-left: 20px; font-size: 40px;">Be their best friend!</h1>

                    <div style="margin-left: 20px">

                        <br />
                        <br />
                        <br />
                        <br />


                            <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show1.jpg" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 20px; margin-top: 53px;">
                                    Just in time friends information, all in one place.
                                </div>
                            </div>

                        <br />
                        <br />

                        <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show2.jpg" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 20px; margin-top: 89px;">
                                    All private information is securily guarded, audited and shared.
                                </div>
                            </div>

                        <br />
                        <br />

                        <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show3.png" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 20px; margin-top: 89px;">
                                    Backed by the NSA.
                                </div>
                            </div>

                        <br />
                        <br />

                        <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show4.png" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 20px; margin-top: 24px;">
                                    Partnered with Facebook.
                                </div>
                            </div>



                        <br />
                        <br />
                        <hr>
                        <br />

                        <h1 style="margin-left: 20px; font-size: 40px; text-align: center;">Jois us now!</h1>

                        <br />
                        <br />
                        <div class="" style="text-align: center;">
                            <a style="font-size: 40px;" href="javascript:void(0)" class="btn btn-primary btn-lg">Start free trial</a>
                        </div>

                        <br />

                        <p style="text-align: center; font-size: 12px; font-style: italic;">We won't use all your filled information to spam you, only a bit... or not?!</p>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
