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
	<form is="iron-form" method="post" action="/announcement/publish" id="presubmit">
	  <paper-input name="title" label="Title" value="You announcement title" required></paper-input>
	  <paper-input name="source_url" label="Source" value=""></paper-input>
	  <paper-button raised onclick="_submit(event)">Submit</paper-button>
	  <paper-button raised onclick="_reset(event)">Reset</paper-button>
	  <div class="output"></div>
	</form>
</div>
<script>
  function _submit(event) {
    // Polymer.dom(event).localTarget.parentElement.submit();
  }
  function _reset(event) {
    var form = Polymer.dom(event).localTarget.parentElement
    form.reset();
    form.querySelector('.output').innerHTML = '';
  }
  presubmit.addEventListener('iron-form-presubmit', function(event) {
    this.request.params['sidekick'] = 'Robin';
  });
  presubmit.addEventListener('iron-form-submit', function(event) {
    // this.querySelector('.output').innerHTML = JSON.stringify(event.detail);

  });
</script>

@endsection