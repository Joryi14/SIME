@extends('layouts.app')
@section('content')
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
@endsection