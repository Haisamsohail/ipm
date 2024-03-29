<!doctype html>
<html class="fixed">
    <head>

        {{--<script type="text/javascript">--}}
            {{--$(function()--}}
            {{--{--}}
                {{--$.ajaxSetup({--}}
                    {{--headers: {--}}
                 {{--'X-CSRF-Token': $('meta[name="_token"]').attr('content')--}}
               {{--}--}}
             {{--});--}}
            {{--});--}}

        {{--</script>--}}

        <!-- Basic -->
        <meta charset="UTF-8">
        <title>IPM - Integrated Pest Management Services  - ECO Services</title>
        <meta name="keywords" content="IPM - ECO Services" />
        <meta name="description" content="IPM - ECO Services">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="{{ asset('/public/assets/stylesheets/skins/fonts.css')}}" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap/css/bootstrap.css')}}" />

        <link rel="stylesheet" href="{{ asset('/public/assets/vendor/font-awesome/css/font-awesome.css')}}" />
        <link rel="stylesheet" href="{{ asset('/public/assets/vendor/magnific-popup/magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/theme.css')}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/skins/default.css')}}" />

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/theme-custom.css')}}">

        <!-- Head Libs -->
        <script src="{{ asset('/public/assets/vendor/modernizr/modernizr.js')}}"></script>

    </head>
    <body>

        <!-- start: page -->
        <section class="body-sign">
            <div class="center-sign">
                <a href="" class="logo pull-left">
                    <img src="{{ asset('/public/assets/images/logo.png')}}" height="54" alt="Porto Admin" />
                </a>

                <div class="panel panel-sign">
                    <div class="panel-title-sign mt-xl text-right">
                        <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In (IPM - ECO SERVICES)</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{url('/userlogin')}}" method="POST" name="LoginForm">
                            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                         {{ csrf_field() }}
                            <div class="form-group mb-lg">
                                <label>Username</label>
                                <div class="input-group input-group-icon">
                                    <input name="username" type="text" class="form-control input-lg" required />
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mb-lg">
                                <div class="clearfix">
                                    <label class="pull-left">Password</label>
<!--                                     <a href="pages-recover-password.html" class="pull-right">Lost Password?</a> -->
                                </div>
                                <div class="input-group input-group-icon">
                                    <input name="password" type="password" class="form-control input-lg" required/>
                                    <span class="input-group-addon">
                                        <span class="icon icon-lg">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="checkbox-custom checkbox-default">
                                        <input id="RememberMe" name="rememberme" type="checkbox"/>
                                        <label for="RememberMe">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-right">
                                    <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In </button>
                                </div>
                            </div>

<!--                             <span class="mt-lg mb-lg line-thru text-center text-uppercase">
                                <span>or</span>
                            </span>

                            <div class="mb-xs text-center">
                                <a class="btn btn-facebook mb-md ml-xs mr-xs">Connect with <i class="fa fa-facebook"></i></a>
                                <a class="btn btn-twitter mb-md ml-xs mr-xs">Connect with <i class="fa fa-twitter"></i></a>
                            </div>

                            <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p>
 -->
 <br>
         @if (session('message'))
             <div class="alert alert-danger">
               {{ session('message') }}
             </div>
            @endif
                        </form>
                    </div>
                </div>

                <p class="text-center text-muted mt-md mb-md">&copy; Copyright 2019. All Rights Reserved.</p>
            </div>
        </section>
        <!-- end: page -->

        <!-- Vendor -->
        <script src="{{ asset('/public/assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
        <script src="{{ asset('/public/assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{ asset('/public/assets/javascripts/theme.js')}}"></script>
        
        <!-- Theme Custom -->
        <script src="{{ asset('/public/assets/javascripts/theme.custom.js')}}"></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{ asset('/public/assets/javascripts/theme.init.js')}}"></script>

    </body>
</html>