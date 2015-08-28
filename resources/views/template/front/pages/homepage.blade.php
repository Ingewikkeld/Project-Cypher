@extends('template.front.1column-home')

@section('body_class') home @endsection

@section('content')
    <div class="container" ng-app="cypher_app">
        @include('template.front.pages.layout')
        <div class="row">
            <div class="col-xs-12">
                <h1>Home</h1>
                <homepage></homepage>
            </div>
        </div>
    </div>
@endsection