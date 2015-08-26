@extends('template.front.1column-home')

@section('body_class') home @endsection

@section('content')

<div class="container" ng-app="cypher_app">
    <div class="row">
        <div class="col-md-12">
        dashboard
            <person-dashboard></person-dashboard>
        </div>
    </div>
</div>

@endsection