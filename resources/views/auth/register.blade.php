@extends('layouts.app')
@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="/"><b>SIME</b></a>
    </div>  
    <div class="register-box-body">
        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf
        <div class="form-group has-feedback">
            <input id="name" placeholder="Nombre" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
           @endif
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
        <input placeholder="Cedula" id="Cedula" type="text" class="form-control{{ $errors->has('Cedula') ? ' is-invalid' : '' }}" name="Cedula" value="{{ old('Cedula') }}" required autofocus>
        @if ($errors->has('Cedula'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Cedula') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input placeholder="Contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
            <button type="submit" class="btn" style="background:#750B06;color:white">Registrar</button> 
            <a class="btn btn-link" href="{{ route('login') }}">¿Ya tiene Cuenta?</a>  
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->
@endsection
