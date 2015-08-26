@extends('template.front.1column-home')

@section('body_class') search @endsection

@section('content')
    {{--    @include('template.front.pages.homepage.welcome')--}}
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Search</h1>

                <add-person></add-person>
            </div>
        </div>
    </div>
@endsection