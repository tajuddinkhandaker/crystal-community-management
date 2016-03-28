@extends('layouts.app')

@section('title', 'Dashboard')

@section('paper-elements')
<link rel="import"
    href="bower_components/polymer/polymer.html">
<link rel="import"
    href="bower_components/paper-item/paper-item.html">
@endsection

@section('header-styles')
<style is="custom-style">
  paper-item.fancy {
    --paper-item-focused: {
      background: var(--paper-amber-500);
      font-weight: bold;
    };
    --paper-item-focused-before: {
      opacity: 0;
    };
  }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div role="listbox">
                        <a href="/user-profile" tabindex="-1">
                          <paper-item class="fancy" raised>Edit Profile</paper-item>
                        </a>
                        <a href="/publish-announcement" tabindex="-1">
                            <paper-item class="fancy" raised>Publish New Announcement</paper-item>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
