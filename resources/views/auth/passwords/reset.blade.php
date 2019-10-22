@extends('layouts.app')
@section('content')
<div class="login-box">
          <div class="login-logo">
            <a href="/"><b>SIME</b></a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
                <i class="glyphicon glyphicon-envelope  form-control-feedback" style="color:#750B06"></i>
                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
              </div>
              <div class="form-group has-feedback">
              <input  placeholder="Confirmar Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              <i class="glyphicon glyphicon-envelope  form-control-feedback" style="color:#750B06"></i>  
              </div>
              <div class="row">
                <!-- /.col -->
                <div class="col-xs-5">
                <button type="submit" class="btn  btn-raised btn-block btn-flat" style="background:#750B06;color:white">
                 Restaurar
                </button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
@endsection