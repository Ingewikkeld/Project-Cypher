@extends('layout.master')

@section('head')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADMIN</title>

    <meta name="robots" content="noindex, nofollow">

    <link rel="icon" href="admin/images/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="admin/images/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="admin/images/favicon-160x160.png" sizes="114x114"/>
    <link rel="apple-touch-icon" href="admin/images/favicon-160x160.png" sizes="72x72"/>
    <link rel="apple-touch-icon" href="admin/images/favicon-160x160.png"/>

    <link rel="stylesheet" href="admin/css/app.min.php">

@endsection

@section('after_body_start')

    <!-- Nav for accessibility-->
    <div id="top" class="sr-only">Bovenkant van de pagina</div>
    <a href="#content" class="sr-only">Direct naar content</a>

@endsection

@section('before_body_end')

    <script src="admin/js/app.min.php"></script>

    <!-- Nav for accessibility-->
    <a href="#top" class="sr-only">Terug naar de bovenkant van de pagina</a>

@endsection