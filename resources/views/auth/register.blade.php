@extends('layouts.app')
@section('content')
<div class="container">
        <form method="POST" class="form-signin" role="form" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf
              <h3 class="form-signin-heading"><a href="/">SIME</a></h3>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon">
            <span class="glyphicon glyphicon-user"></span>
           </div>
            <input id="name" placeholder="Nombre" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
           @endif
        </div>
        </div>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon">
             <span class="glyphicon glyphicon-envelope "></span>
           </div>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        </div>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon">
          <span class="glyphicon glyphicon-credit-card"></span>
           </div>
        <input placeholder="Cédula" id="Cedula" type="text" class="form-control{{ $errors->has('Cedula') ? ' is-invalid' : '' }}" name="Cedula" value="{{ old('Cedula') }}" required autofocus>
        @if ($errors->has('Cedula'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('Cedula') }}</strong>
            </span>
        @endif
        </div>
      </div>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon">
              <span class="glyphicon glyphicon-lock"></span>
           </div>
            <input placeholder="Contraseña" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>
      </div>
        <div class="form-group">
          <div class="input-group">
           <div class="input-group-addon">
               <span class="glyphicon glyphicon-log-in"></span>
           </div>
            <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required>
        </div>
      </div>
            <button type="submit" class="btn btn-block btn-primary">Registrar</button>
            <a class="btn btn-link" href="{{ route('login') }}">¿Ya tiene Cuenta?</a>
      </form>
    </div>
@endsection
