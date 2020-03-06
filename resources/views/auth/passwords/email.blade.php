@extends('layouts.app')
@section('content')
<div class="container">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
          <form method="POST" class="form-signin" role="form"  action="{{ route('password.email') }}" aria-label="{{ __('Restaurar Contraseña') }}">
              @csrf
            <h3 class="form-signin-heading"><a href="/">SIME</a></h3>
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
                <button type="submit" class="btn btn-block btn-primary">
                 Enviar
                </button>
            </form>
</div>
@endsection
