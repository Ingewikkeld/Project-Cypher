@extends('layout.front')

@section('layout_main')

    @include('template.front.framework.header')

    <section id="content" class="container" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 content_content">
                    @yield('content_right')
                </div>
                <div class="col-md-4 col-float-left content_sidebar">
                    @yield('content_left')
                </div>
            </div>
        </div>
    </section>

    @include('template.front.framework.footer')

@endsection

