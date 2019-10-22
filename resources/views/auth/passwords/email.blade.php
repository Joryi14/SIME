@extends('layouts.app')
@section('content')
<div class="login-box">
          <div class="login-logo">
            <a href="/"><b>SIME</b></a>
          </div>
          <!-- /.login-logo -->
          
          <div class="login-box-body">
            <h4>Recuperar Contraseña</h4>  
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Restaurar Contraseña') }}">
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
              <div class="row">
                <!-- /.col -->
                <div class="col-xs-5">
                <button type="submit" class="btn  btn-raised btn-block btn-flat" style="background:#750B06;color:white">
                 Enviar
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
