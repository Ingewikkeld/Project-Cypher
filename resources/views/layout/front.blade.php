@extends('layout.master')

@section('head')

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="robots" content="index, follow"/>


    {{-- //favicon and touch-icons --}}
    {{--<link rel="icon" href="/favicon.ico" type="image/x-icon"/>--}}
    {{--<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>--}}
    {{--<link rel="apple-touch-icon" href="/favicon160x160.png" sizes="114x114"/>--}}
    {{--<link rel="apple-touch-icon" href="/favicon160x160.png" sizes="72x72"/>--}}
    {{--<link rel="apple-touch-icon" href="/favicon160x160.png"/>--}}

    <link rel="stylesheet" href="/front/css/app.min.php"/>
@endsection

@section('after_body_start')

    <!-- Nav for accessibility-->
    <div id="top" class="sr-only">Bovenkant van de pagina</div>
    <a href="#content" class="sr-only">Direct naar content</a>

    <!--[if lt IE 8]>
    <div class="alert alert-warning">
        You are using an <strong>outdated</strong> browser. Please
        <a href="http://browsehappy.com/">upgrade your browser</a>
        to improve your experience.
    </div>
    <![endif]-->

@endsection

@section('before_body_end')

{{--    @include('template.front.framework.google-analytics')--}}

    @yield('custom_scripts_before')
    <script src="/front/js/app.min.php"></script>
    @yield('custom_scripts_after')

    <!-- Nav for accessibility-->
    <a href="#top" class="sr-only">Terug naar de bovenkant van de pagina</a>
@endsection