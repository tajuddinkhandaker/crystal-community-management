@extends('layouts.master-main')

@section('title', 'Home')

@section('header-styles')
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
@endsection

@section('polymer-elements')

    <!-- <link rel="import"
        href="bower_components/google-signin/google-signin.html"> -->
    <!-- <link rel="import"
        href="bower_components/google-doc/google-doc.html"> -->


<link rel="import" href="crystal-elements/crystal-core-pages.html">

@endsection

@section('content')

    <crystal-core-pages></crystal-core-pages>

@endsection

@section('footer-scripts')

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

@endsection