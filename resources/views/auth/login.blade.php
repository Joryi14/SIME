@extends('layouts.app')
@section('content')
<div class="container">
            <form class="form-signin" role="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
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
              <div class="form-group">
                <div class="input-group">
                 <div class="input-group-addon">
                   <i class="glyphicon glyphicon-lock"></i>
                 </div>
                    <input id="password" placeholder="Contraseña" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              </div>
            </div>
            <label class="checkbox">
                     <input type="checkbox" value="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                   </label>
                   <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            </form>
</div>
        <div class="site-footer login-footer">
          <div class="clearfix"></div>
          <br><br>
       <div class="container">
         <div class="copyright clearfix text-center">
           <a class="btn btn-link" href="{{ route('password.request') }}">¿Olvido la contraseña?</a>
           <a class="nav-link" href="{{ route('register') }}"><b>Registrar</b></a>
         </div>
       </div>
     </div>
@endsection
