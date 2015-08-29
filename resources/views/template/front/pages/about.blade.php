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

                        <p style="font-size: 20px;">
                            Bacon ipsum dolor amet andouille flank capicola strip steak meatloaf,
                            kevin biltong brisket short loin hamburger pancetta pork chop turkey chuck.
                            Bacon kielbasa capicola chicken ribeye prosciutto short loin. Filet mignon boudin ham hock,
                            meatball chuck doner venison beef ribs pork corned beef tail bresaola tri-tip.
                            Corned beef bresaola pork loin cupim turkey biltong swine landjaeger alcatra hamburger pastrami ribeye kielbasa frankfurter.
                            Sausage shoulder biltong frankfurter bresaola swine t-bone.
                        </p>

                        <br />

                        <h2>Important qualities:</h2>
                        <ul style="font-size: 18px;">
                            <li>
                                Just in time friends information
                            </li>
                            <li>
                                All their information in one place
                            </li>
                            <li>
                                Complete secure envirionment*
                            </li>
                        </ul>
                        <br />

                        *Sealed by the NSA


                        <br />
                        <br />
                        <br />
                        <br />


                            <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show1.jpg" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 18px;">
                                    Jowl rump chicken turkey porchetta. Ball tip pork chop beef ribs tri-tip. Leberkas tri-tip kevin ham chuck short ribs turkey kielbasa landjaeger spare ribs cupim.
                                </div>
                            </div>
                        <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show2.jpg" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 18px;">
                                    Meatball pastrami cupim biltong
                                </div>
                            </div>
                        <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show3.png" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 18px;">
                                    Short loin swine sausage alcatra t-bone flank andouille capicola. Spare ribs chuck ribeye shankle pork loin strip steak. Shankle jowl sirloin shoulder, venison bresaola capicola ribeye corned beef fatback.
                                </div>
                            </div>
                        <div class="row" style="margin-bottom: 2em;">
                                <div class="col-xs-3">
                                    <img src="/front/images/about/show4.png" style="width: 100%; max-height: 400px; border-radius: 50%" />
                                </div>
                                <div class="col-xs-9" style="font-size: 18px;">
                                    Pork loin chuck rump biltong pork leberkas chicken corned beef alcatra. Bacon strip steak venison, capicola salami ham boudin pastrami pork chop shank pancetta prosciutto. Shank pork strip steak short loin.
                                </div>
                            </div>



                        <br />
                        <br />
                        <hr>
                        <br />
                        <p style="font-size: 22px;">
                            Short loin swine sausage alcatra t-bone flank andouille capicola. Spare ribs chuck ribeye shankle pork loin strip steak. Shankle jowl sirloin shoulder, venison bresaola capicola ribeye corned beef fatback.

                        </p>
                        <br />
                        <div class="" style="text-align: center;">
                            <a style="font-size: 40px;" href="javascript:void(0)" class="btn btn-primary btn-lg">Start free trial</a>
                        </div>

                        <br />

                        <p style="text-align: center; font-size: 10px; font-style: italic;">We won't use all your filled information to spam you, only a bit... or not?!</p>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection