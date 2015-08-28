@extends('template.front.1column-home')

@section('body_class') search @endsection

@section('content')
    <div class="container" ng-app="cypher_app">
        @include('template.front.pages.layout')
        <div class="row">
            <div class="col-xs-12">
                <h1>Search</h1>
                <search-people></search-people>
            </div>
        </div>
    </div>
@endsection