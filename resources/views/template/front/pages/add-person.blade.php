@extends('template.front.1column-home')

@section('body_class') add-person @endsection

@section('content')
    <div class="container" ng-app="cypher_app">
        @include('template.front.pages.layout')
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Add person</h1>

                    <br />
                    <add-person></add-person>
                </div>
            </div>
        </div>
    </div>
@endsection

