@extends('master-main')

@section('title', 'Home')

@section('header-styles')
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
@endsection

@section('polymer-elements')

    <link rel="import" href="crystal-elements/crystal-image-slider.html">
    <link rel="import" href="crystal-elements/crystal-dummy-pages.html">

@endsection

@section('content')
	
    <paper-material elevation="3">    
	   <crystal-image-slider></crystal-image-slider>
    </paper-material>

    <crystal-dummy-pages></crystal-dummy-pages>

@endsection

@section('footer-scripts')

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

@endsection