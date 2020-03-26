@extends('layouts.app')
@section('content')
<div class="container">
            <form method="POST" class="form-signin" role="form"  action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
            <input type="hidden" name="token" value="{{ $token }}">
              <div class="form-group">
                <div class="input-group">
                 <div class="input-group-addon">
                  <i class="glyphicon glyphicon-envelope"></i>
                 </div>
                <input id="email" placeholder="Correo Electrónico" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
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
                    <i class="glyphicon glyphicon-envelope"></i>
                 </div>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
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
                  <i class="glyphicon glyphicon-envelope"></i>
                 </div>
              <input  placeholder="Confirmar Contraseña" id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
              </div>
                <button type="submit" class="btn  btn-raised btn-block btn-primary">
                 Restaurar
                </button>
            </form>
            </div>
@endsection
