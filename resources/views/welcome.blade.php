<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Sistema Informacion de Manejo Emergencias</title>
  <link rel="stylesheet" href="{{asset("assets/heroic/vendor/bootstrap/css/bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/heroic/css/heroic-features.css")}}" >
    </head>  
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container">
                  <a class="navbar-brand" href="/">SIME</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                            @if (Route::has('login'))
                                @auth
                                <li class="nav-item">
                                <a class="nav-link" href="{{ url('/home') }}">Sistema</a>
                                </li>
                                @else
                                <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Acceder</a>
                                </li>
                                    @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                                </li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </ul>
                  </div>
                </div>
    <script src="{{asset("assets/heroic/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("assets/heroic/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>        
    </body>
</html>
