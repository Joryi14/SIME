<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('Titulo','SIME') |Sistema de Informacion de Manejo de Emergencias</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/site.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <script type="text/javascript" src="{{asset("assets/$theme/dist/js/site.min.js")}}"></script>
  @yield('styles')
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">  
</head>
<body>
      @include("theme/$theme/header")
    <div class="container-fluid">
      @include("theme/$theme/aside")
    <div class="content-wrapper">
        <section class="content">
           @yield('Contenido')
          </section>
  </div>
    @include("theme/$theme/footer")
 </div>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
@yield('scriptsPlugins')
<script src="{{asset("assets/js/scripts.js")}}"></script>
@yield('Script')
</body>
</html>