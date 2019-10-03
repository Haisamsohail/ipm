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
      width: 100%;

    }
    .page-break {
      page-break-before: always;
    }
  </style>
</head>
<body>

@foreach($PageArray as $key => $Page)

  <div style=" border-radius: 10px;border: 2px solid black; padding: 5px; height: 192px; background: white">

    <div style="width: 40%;float: left;font-size: 8px;line-height: 15px;">
      <br>
      <p style="text-align: center"><img src="{{ asset('/public/assets/images/logoeco.png')}}" class="center"  /></p>
    </div>
    <div style="width: 60%;float: right;  height: 25px;  font-size: 18px;text-align: right; vertical-align: middle; line-height: 1.5em;">
      <p style="float: right ">
        <img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(65)->generate($Page[3])) }} ">
      </p>
    </div>

    <div style="clear: both;"></div>

    <p style="text-align: center" style=" background: black; text-align: center; font-size: 12px; margin: 0px;line-height: 15px; margin-bottom: 10px; padding: 0px; border: 1px solid black; color: white " >{{ $Page[0] }}</p>

    <div style="width: 70%;float: left;font-size: 14px;line-height: 15px;color: black;">
      &#9656; {{ $Page[1] }}
      <br>
      &#9656; {{ $Page[2] }}
    </div>
    <div style=" border-radius: 5px;width: 30%;float: right; background: black; color: white; height: 25px;  font-size: 18px;text-align: center; vertical-align: middle; line-height: 1.5em;">
      {{$Page[4]}}
    </div>

  </div>

<div class="page-break"></div>

  <div style=" border-radius: 10px;border: 2px solid black; padding: 5px; height: 192px; background: white">
    <br>
    <div style="width: 40%;float: left;font-size: 8px;line-height: 15px;">
      <p style="text-align: center"><img src="{{ asset('/public/assets/images/logoeco.png')}}" class="center"  /></p>
    </div>
    <div style="width: 60%;float: right;  height: 25px;  font-size: 18px;text-align: right; vertical-align: middle; line-height: 1.5em;">
      <p style="float: right ">
        <img src="{{ asset('/public/assets/images/backlabel.jpg')}}" style="margin: auto;width: 50%;" >
      </p>

    </div>
    <div style="clear: both;"></div>

    <p style="text-align: center" style=" background: black; text-align: center; font-size: 12px; margin: 0px;line-height: 15px; margin-bottom: 10px; padding: 0px; border: 1px solid black; color: white " >{{ $Page[0] }}</p>
    <div style="width: 60%;float: left;font-size: 14px;line-height: 15px;color: black;">
      &#9656; {{ $Page[1] }}
      <br>
      &#9656; {{ $Page[2] }}
    </div>
    <div style=" border-radius: 5px;width: 30%;float: right; background: black; color: white; height: 25px;  font-size: 18px;text-align: center; vertical-align: middle; line-height: 1.5em;">
      {{$Page[4]}}
    </div>

  </div>
@endforeach

</body>
</html>