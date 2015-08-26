@extends('template.front.1column-home')

@section('body_class') home @endsection

@section('content')

<div class="container" ng-app="cypher_app">
    <div class="row">
        <div class="col-md-12">
            <add-person></add-person>
        </div>
    </div>
</div>

@endsection