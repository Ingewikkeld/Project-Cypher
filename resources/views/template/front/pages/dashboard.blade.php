@extends('template.front.1column-home')

@section('body_class') dashboard @endsection

@section('content')

<div class="container" ng-app="cypher_app">

    @include('template.front.pages.addperson.layout')
    <div class="row">
        <div class="col-md-12">
            <person-dashboard data-id="{{ $id }}"></person-dashboard>
        </div>
    </div>
</div>

@endsection