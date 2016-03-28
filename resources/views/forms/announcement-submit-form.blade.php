@extends('layouts.app')

@section('title', 'New Announcement')

@section('paper-elements')

<link rel="import"
    href="../bower_components/polymer/polymer.html">
<link rel="import"
    href="../bower_components/iron-form/iron-form.html">
<link rel="import"
    href="../bower_components/paper-input/paper-input.html">
<link rel="import"
    href="../bower_components/paper-button/paper-button.html">
@endsection

@section('content')

<div class="container">
	<form method="post" action="/announcement/publish" id="form">
    {{ csrf_field() }}
	  <paper-input name="title" label="Title" placeholder="You announcement title" value="" required></paper-input>
	  <paper-input name="source_url" label="Source" placeholder="The source url for your announcement" value=""></paper-input>
	  <paper-button raised onclick="_submit(event)">Submit</paper-button>
	</form>
</div>
<script>
  function _submit(event) {
    $('#form').submit();
  }
  form.addEventListener('iron-form-submit', function(event) {
      window.location.href = '/home';
      // this.querySelector('.output').innerHTML = JSON.stringify(event.detail);
  });
  form.addEventListener('iron-form-error', function(event) {
      // this.querySelector('.output').innerHTML = JSON.stringify(event.detail);
  });
</script>

@endsection