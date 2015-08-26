@extends('layout.front')

@section('layout_main')

    @include('template.front.framework.header')

    <section id="content" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 content_left">
                    @yield('content_left')
                </div>
                <div class="col-md-6 content_right">
                    @yield('content_right')
                </div>
            </div>
        </div>
    </section>

    @include('template.front.framework.footer')

@endsection


