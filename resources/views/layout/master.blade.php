<!DOCTYPE html>
<html lang="nl">
<head>
    @yield('head')
</head>
<body class="@yield('body_class')">
    <div id="responsive_check" style="display: none;"></div>

    @yield('after_body_start')

    @yield('layout_main')

    @yield('before_body_end')

    {{--<script>document.write('<script src="http://winelist-website.dev/livereload.js?snipver=1"></' + 'script>')</script>--}}

</body>
</html>

