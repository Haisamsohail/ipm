<!doctype html>
<html class="sidebar-light sidebar-left-big-icons">
<head>

  <!-- Basic -->
  <meta charset="UTF-8">

  <meta charset="UTF-8">
  <title>Integrated Pest Management Services</title>
  <meta name="keywords" content="IPM - ECO Services" />
  <meta name="description" content="IPM - ECO Services">
  <meta name="author" content="okler.net">

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Web Fonts  -->
  <link href="{{ asset('/public/assets/stylesheets/skins/fonts.css')}}" rel="stylesheet" type="text/css">

  <!-- Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/font-awesome/css/font-awesome.css')}}" />
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/magnific-popup/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />

  <!-- Specific Page Vendor CSS -->
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/jquery-ui/jquery-ui.css')}}" />
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/jquery-ui/jquery-ui.theme.css')}}" />
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />
  <link rel="stylesheet" href="{{ asset('/public/assets/vendor/morris.js/morris.css')}}" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/theme.css')}}" />

  <!-- Skin CSS -->
  <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/skins/default.css')}}" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="{{ asset('/public/assets/stylesheets/theme-custom.css')}}">

  <!-- Head Libs -->
  <script src="{{ asset('/public/assets/vendor/modernizr/modernizr.js')}}"></script>

  <script src="{{ asset('/public/js/jquery-1.10.1.min.js')}}"></script>
  <script src="{{ asset('/public/assets/vendor/jquery/jquery.js')}}"></script>
  <style>
    .center {
      display: block;
      margin-left: auto;
      margin-right: auto;
      margin-top: 0px;
      padding-top: 0px;
      width: 30%;

    }
    .page-break {
      page-break-after: always;
    }
  </style>
</head>
<body>

<div style="border: 2px solid black; padding: 5px; height: 192px; background: white">
  <p style="text-align: center"><img src="{{ asset('/public/assets/images/logo.png')}}" class="center"  /></p>
  <p style="text-align: center">
    <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(65)->generate($stationapplyid)) }} ">
  </p>
  <p style="text-align: center" style=" text-align: center; font-size: 10px; margin: 0px; margin-bottom: 10px; padding: 0px; border: 1px solid black" >{{ $companyname }}</p>
    <div style="width: 70%;float: left;font-size: 8px;line-height: 15px;">
      Location : {{ $branchlocationname }}
      <br>
      Station : {{ $stationname }}
    </div>
    <div style="width: 30%;float: right; background: black; color: white; height: 25px;  font-size: 18px;text-align: center; vertical-align: middle; line-height: 1.5em;">
      {{$stationapplyid}}
    </div>
  <p style="text-align: center" style=" text-align: center; font-size: 8px; margin: 0px; padding: 0px; line-height: 12px; " >
   </p>
</div>

<div class="page-break"></div>
<div style="border: 2px solid black; padding: 5px; height: 192px; background: white">
  <p style="text-align: center"><img src="{{ asset('/public/assets/images/logo.png')}}" class="center"  /></p>
  <p style="text-align: center">
    <img src="{{ asset('/public/assets/images/backlabel.jpg')}}" style="margin: auto;width: 50%;" >
  </p>
  <p style="text-align: center" style=" text-align: center; font-size: 10px; margin: 0px; margin-bottom: 10px; padding: 0px; border: 1px solid black" >{{ $companyname }}</p>
  <div style="width: 70%;float: left;font-size: 8px;line-height: 15px;">
    Location : {{ $branchlocationname }}
    <br>
    Station : {{ $stationname }}
  </div>
  <div style="width: 30%;float: right; background: black; color: white; height: 25px;  font-size: 18px;text-align: center; vertical-align: middle; line-height: 1.5em;">
    {{$stationapplyid}}
  </div>
  <p style="text-align: center" style=" text-align: center; font-size: 8px; margin: 0px; padding: 0px; line-height: 12px; " >
  </p>
</div>
</body>
</html>