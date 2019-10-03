<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SIME | Iniciar Sesion</title>
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
  <!-- Material Design -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/bootstrap-material-design.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/ripples.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/MaterialAdminLTE.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/skins/all-md-skins.css")}}">
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page skin-red-light">
        <div class="login-box">
          <div class="login-logo">
            <a href="/"><b>SIME</b></a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
           
        
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
              <div class="form-group has-feedback">
                <input id="email" placeholder="Correo Electrónico" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                <i class="glyphicon glyphicon-envelope  form-control-feedback" style="color:#750B06"></i>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
              </div>
              <div class="form-group has-feedback">
                    <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback" style="color:#750B06"></span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </div>
              <div class="row">
                <div class="col-xs-7">
                  <div class="checkbox">
                    <label>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-5">
                <button type="submit" class="btn  btn-raised btn-block btn-flat" style="background:#750B06;color:white">
                Ingresar
                </button>
                
                </div>
                <!-- /.col -->
              </div>
            </form>
            <a class="btn btn-link" href="{{ route('password.request') }}">¿Olvide la contraseña?</a>
            <a class="nav-link" href="{{ route('register') }}"><b>Registrar</b></a>
          </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
<script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- Material Design -->
<script src="{{asset("assets/$theme/dist/js/material.min.js")}}"></script>
<script src="{{asset("assets/$theme/dist/js/ripples.min.js")}}"></script>
<script>
    $.material.init();
</script>
</body>
</html>