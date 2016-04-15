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
        <!-- sweet alert -->
        <script src="bower_components/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bower_components/sweetalert/dist/sweetalert.css">
        <!-- Font Awesome -->
        <link href="fonts/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- fake loader - loading icon on load -->
        <link rel="stylesheet" href="bower_components/fakeLoader/fakeLoader.css">

        <script src="bower_components/webcomponentsjs/webcomponents.js"></script>
        @yield('header-scripts')

        <link rel="import" href="bower_components/paper-scroll-header-panel/paper-scroll-header-panel.html">
        <link rel="import" href="bower_components/paper-header-panel/paper-header-panel.html">
        <link rel="import" href="bower_components/paper-material/paper-material.html">
        <link rel="import" href="bower_components/paper-progress/paper-progress.html">

        @yield('polymer-elements')

        <link rel="import" href="crystal-elements/crystal-header-menubar.html">
        <link rel="import" href="crystal-elements/crystal-social-fab.html">
        <link rel="import" href="crystal-elements/crystal-drawer-item.html">
        <link rel="import" href="crystal-elements/crystal-scroll-infobar.html">
        <style>
            body {
                padding-top: 0px;
                /*background: url(/images/header_bg1.jpg);*/
                background-repeat: no-repeat;
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
            .copyright {
                color: #6D6D6D;
                background: #E9E9E9;
                padding: 20px 0;
            }
            .topHome {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 5;
                background: #CC4646;
            }
            .topHome .fa-2x {
                font-size: 20px;
                color:#fff;
                margin: 0px;
                float: right;
            }

        </style>
    </head>
    <body class="fullbleed layout vertical">

        <div id="fakeLoader"></div>
        <!-- <paper-progress indeterminate></paper-progress> -->

        <paper-header-panel>

            <crystal-header-menubar id="top"
                banner-logo='{ "src": "/images/su-logo.png", "alt": "AIT Student Union Logo" }'
                banner-title="Asian Institute of Technology">
            </crystal-header-menubar>

            <div class="content">
                <div>
                    @include('includes.flash')
                </div>

                <crystal-scroll-infobar></crystal-scroll-infobar>

                @yield('content')

            </div>  

            <crystal-social-fab></crystal-social-fab>          

            <section class="copyright fullbleed">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-4">
                                    <span class="glyphicon glyphicon-copyright-mark"></span> 2007 - 2008 AIT Asian Institute of Technology<br>
                                    <a href="http://www.ait.ac.th/about/contact" class="footer-text">Contact Us</a> | <a href="http://www.ait.ac.th/about/visiting-ait" class="footer-text">How to Find Us</a>
                                </div>
                              <div class="col-sm-8">
                                <span>
                                    AIT Asian Institute of Technology, P.O. Box 4, Klong Luang, Pathumthani 12120, Thailand <br>
                                    Telephone: (66 2) 5245000 or (66 2) 5160110-44 Fax: (66 2) 5162126
                                </span>
                              </div>
                            </div>
                            <div class="text-center pull-right">
                                Powered by <a href="http://crystaltech.spinelbd.com">Crystal Technology Bangladesh Ltd.</a>
                            </div>
                        </div>
                    </div>
                    <!-- / .row -->
                </div>
            </section>
            <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

        </paper-header-panel>

    </body>
    <script src="bower_components/fakeLoader/fakeLoader.min.js"></script>
    <script>
        $('body').load(function(){
            $("#fakeloader").fakeLoader({
                timeToHide:5000,
                bgColor:"#2ecc71",
                spinner:"spinner1"
            });
        });
    </script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/crystal-sweet-alert.js"></script>
    <script>
        $(window).resize(function() {
          // This will execute whenever the window is resized
          $(window).height(); // New height
          $(window).width(); // New width
          // console.log('window size: ' + $(window).width() + 'x' + $(window).height());
        });
    </script>
    @yield('footer-scripts')
</html>