@extends('layouts.app')

@section('title', 'New Announcement')

@section('paper-elements')

<link rel="import"
    href="../bower_components/polymer/polymer.html">
<link rel="import"
    href="../bower_components/iron-form/iron-form.html">
<link rel="import"
    href="../bower_components/iron-input/iron-input.html">
<link rel="import"
    href="../bower_components/paper-input/paper-input.html">
<link rel="import"
    href="../bower_components/paper-input/paper-input-container.html">
<link rel="import"
    href="../bower_components/paper-button/paper-button.html">
<link rel="import"
    href="../bower_components/paper-checkbox/paper-checkbox.html">
<link rel="import"
    href="../bower_components/plastik-url-validator/plastik-url-validator.html">
<link rel="import"
    href="../bower_components/paper-input-date-picker/paper-input-date-picker.html">
@endsection

@section('content')

<div class="container">
  <div class="output"></div>
	<form is="iron-form" method="post" action="/announcement/publish" id="form">
    {{ csrf_field() }}
	  <paper-input name="title" label="Title" placeholder="You announcement title" value="" required></paper-input></br></br>


    <paper-input name="source_url" label="Source URL" placeholder="http://, https://" type="url" 
                  error-message="Enter valid source URL" value="" auto-validate></paper-input></br></br>

    <paper-checkbox name="has_source_url" value="checked">Enable navigation</paper-checkbox></br></br>

    <paper-input-date-picker name="expired_at" label="Expiration Date" 
                required auto-validate error-message="Your announcement needs an expiration date!">
    </paper-input-date-picker></br></br>

    <paper-button raised onclick="_submit(event)">Submit</paper-button>
	</form>
</div>
<script>
  function _submit(event) {
    $('#form').submit();
  }
  form.addEventListener('iron-form-submit', function(event) {
      // window.location.href = '/home';
      // $('.output').attr('display' ,'block');
      document.querySelector('div.output').innerHTML = '<div class="alert alert-success">' + 'Your announcement is published' + '</div>';
      // console.log(event.detail);
      document.getElementById("form").reset();
  });
  form.addEventListener('iron-form-error', function(event) {
      // $('.output').attr('display' ,'block');
      // document.querySelector('div.output').innerHTML = '<div class="alert alert-error">' + JSON.stringify(event.detail) + '</div>';
      // console.log(event.detail);
      document.querySelector('div.output').innerHTML = '<div class="alert alert-danger">' + 'Your announcement publish failed' + '</div>';
  });
  form.addEventListener('iron-form-response', function(event) {
      // console.log(event.detail);
  });
</script>

@endsection