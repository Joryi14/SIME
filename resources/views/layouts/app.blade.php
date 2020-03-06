<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SIME | Iniciar Sesion</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/site.min.css")}}">
  @yield('styles')
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="{{asset("assets/$theme/dist/js/site.min.js")}}"></script>
  <style>
        body {
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #303641;
          color: #C1C3C6
        }
  </style>
</head>
<body>
    @yield('content')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 @yield('scriptsPlugins')
 <script src="{{asset("assets/js/scripts.js")}}"></script>
 @yield('Script')
</body>
</html>
