<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>AIT | @yield('title')</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        @yield('header-styles')

        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- sweet alert -->
        <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css">

        <script src="bower_components/webcomponentsjs/webcomponents.js"></script>
        @yield('header-scripts')
        <link rel="import" href="bower_components/paper-scroll-header-panel/paper-scroll-header-panel.html">
        <link rel="import" href="bower_components/paper-drawer-panel/paper-drawer-panel.html">
        <link rel="import" href="bower_components/paper-header-panel/paper-header-panel.html">
        <link rel="import" href="bower_components/paper-material/paper-material.html">

        <link rel="import" href="crystal-elements/crystal-header-menubar.html">
        <link rel="import" href="crystal-elements/crystal-social-fab.html">
        <link rel="import" href="crystal-elements/crystal-drawer-item.html">
        <link rel="import" href="crystal-elements/crystal-scroll-infobar.html">
        @yield('polymer-elements')
        <style>
            body {
                padding-top: 0px;
                background: url(/images/header_bg1.jpg);
            }
            
            .starter-template {
                padding: 40px 15px;
                text-align: center;
            }
            /*for sweet alert*/
            .httpError
            {
                overflow: auto;
                height: 50%;
                width: 50%;
            }
        </style>
        <style>
          paper-scroll-header-panel {
            --paper-scroll-header-container {
            }
        }
        </style>
    </head>
    <body class="fullbleed layout vertical">

        <paper-drawer-panel>

            <paper-header-panel drawer>
                <crystal-drawer-item></crystal-drawer-item>
            </paper-header-panel>

            <paper-scroll-header-panel main>

                <crystal-header-menubar></crystal-header-menubar>

                <div class="content">
                    <div>
                        @include('includes.flash')
                    </div>

                    <crystal-scroll-infobar></crystal-scroll-infobar>

                    @yield('content')

                </div>  

                <crystal-social-fab></crystal-social-fab>          

            </paper-scroll-header-panel>

        </paper-drawer-panel>

    </body>
    <script src="js/crystal-sweet-alert.js"></script>
    @yield('footer-scripts')
</html>