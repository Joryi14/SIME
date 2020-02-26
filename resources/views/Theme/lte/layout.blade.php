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
  <script type="text/javascript" src="{{asset("assets/$theme/dist/js/site.min.js")}}"></script>
  @yield('styles')
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">  
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">  
</head>
<body>
  @include("theme/$theme/header")
  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">
      @include("theme/$theme/aside")
      <div class="col-xs-12 col-sm-9 content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a></h3>
          </div>
          @yield('Contenido')
        </div>
      </div>
    </div>
  </div>
 
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('scriptsPlugins')
<script src="{{asset("assets/js/scripts.js")}}"></script>
@yield('Script')
</body>
</html>