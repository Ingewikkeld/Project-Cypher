@extends('layout.front')

@section('layout_main')

    @include('template.front.framework.header')

    <div id="content" role="main">
        @yield('content')
    </div>

    @include('template.front.framework.footer')
@endsection

