@extends('master-main')

@section('title', 'Home')

@section('header-styles')
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
@endsection

@section('polymer-elements')

    <link rel="import" href="crystal-elements/crystal-image-slider.html">
    <link rel="import" href="crystal-elements/crystal-registration-form.html">
    <link rel="import" href="crystal-elements/crystal-dummy-page.html">

@endsection

@section('content')
	
    <paper-material elevation="3">    
	   <crystal-image-slider></crystal-image-slider>
    </paper-material>

    <crystal-dummy-page id="dummy" page-title="About Us"></crystal-dummy-page>

@endsection

@section('footer-scripts')

    <script src="jquery/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

@endsection