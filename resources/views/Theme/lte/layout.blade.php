<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('Titulo','SIME') |Sistema de Informacion de Manejo de Emergencias</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/select2/dist/css/select2.min.css")}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/skins/_all-skins.min.css")}}">
  @yield('styles')
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red-light fixed sidebar-mini">
  
    <!-- Site wrapper -->
    <div class="wrapper">
    
    <!--Header-->
    @include("theme/$theme/header")
    <!--Fin Header-->
    <!--Aside-->
    @include("theme/$theme/aside")
    <!--finAside-->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
           @yield('Contenido')
          </section>
    </div>
    @include("theme/$theme/footer")
 </div>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- SlimScroll -->
<script src="{{asset("assets/$theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
<script src="{{asset("assets/$theme/bower_components/fastclick/lib/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/select2/dist/js/select2.full.min.js")}}"></script>
@yield('scriptsPlugins')
<script src="{{asset("assets/js/scripts.js")}}"></script>
@yield('Script')
</body>
</html>