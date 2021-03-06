<!DOCTYPE html>
<html lang="en">

 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIME</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/Index/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('assets/Index/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{asset("assets/MAP/leaflet.css")}}"/>
  <!-- Custom styles for this template -->
  <link href="{{asset("assets/Index/css/agency.css")}}" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Inicio</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Contactos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#Mapas">Mapas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Inscripción de voluntarios</a>
          </li>
          
              @if (Route::has('login'))
              @auth
              <li class="nav-item">
              <a class="nav-link" href="{{ url('/home') }}">Volver al sistema</a>
              </li>
              @else
              <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Acceder</a>
              </li>
                  @if (Route::has('login'))
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
   @include('Includes.alert')
  </nav>
  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Comité comunal de emergencias de Nosara</div>
        <div class="intro-heading text-uppercase">SIME</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Más información</a>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contactos</h2>
          <h3 class="section-subheading text-muted">Medios para atender dudas, sugerencias o donaciones.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <a href="https://www.facebook.com/CCENosara/" target="_blank">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fab fa-facebook fa-stack-1x fa-inverse"></i></a>
          </span>
          <h4 class="service-heading">Facebook</h4>
          <p class="text-muted">Comite Comunal de Emergencias Nosara</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Correo</h4>
          <p class="text-muted">nosaraemergencias@gmail.com </p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class= "fas fa-map-marked-alt fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Dirección</h4>
          <p class="text-muted">300mts sur del EBAIS de Nosara, oficinas de la ADIN.Reuniones todos los viernes de la  primera semana de cada mes.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Noticias</h2>
          <h3 class="section-subheading text-muted">Todas las novedades de la comunidad de Nosara.</h3>
        </div>
      </div>
      <div class="row">
        @foreach ($noticias as $item)
        <div class="col-md-4 col-sm-6 portfolio-item" width="400" height="300">
            <a class="portfolio-link" data-toggle="modal" href="#por{{$item->IdNoticias}}" >

            <div class="portfolio-hover" width="400" height="300">
              <div class="portfolio-hover-content" width="400" height="300">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
          <img class="img-fluid" src='img/{{$item->Imagenes}}' style='display:block; width:400px;height:300px;' alt="">
          </a>
          <div class="portfolio-caption">
            <h4>{{$item->Titulo}}</h4>
            <p style="white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;" class="text-muted">{{$item->Articulo}}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="page-section" id="Mapas">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Mapas</h2>
          </div>
      </div>
      <br><br>
      <div class="row">
        <div  class="col-sm-6">
        <h3 class="text-center">Albergues</h3>
       <div id="mapid" style="margin-right: auto;margin-left: auto;  width: 100%;
       height: 400px; ">
      </div>
      </div>
      <div class="col-sm-6">
        <h3 class="text-center">Emergencias</h3>
        <div id="mapid2" style="margin-right: auto;margin-left: auto;  width: 100%;
        height: 400px; ">
        </div>
      </div>
    </div>
    </div>
  </section>


  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Equipo de trabajo</h2>
          <h3 class="section-subheading text-muted">Está conformado por una grupo de personas del comité comunal de emergencias de Nosara.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img src="{{asset("assets/images/logos/1.png")}}" alt="Logo">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img  src="{{asset("assets/images/logos/4.png")}}" alt="Logo">
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img  src="{{asset("assets/images/logos/3.png")}}" alt="Logo">
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">SIME es una página para estar más cerca de la población de Nosara y en casos de emergencia tener un manejo adecuado de la situación.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Formulario de inscripción de voluntarios</h2>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form class="form-horizontal" method="POST" action="/VoluntarioWeb/store">
            @csrf
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">

                  <input class="form-control" name="NombreVoluntarioWeb" type="text" placeholder="Nombre *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                  <input class="form-control" name="ApellidoVoluntario1Web" type="text" placeholder="Primer apellido *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="ApellidoVoluntario2Web" type="text" placeholder="Segundo apellido *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <input class="form-control" name="CedulaVoluntarioWeb" type="text" placeholder="# de Identificación *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">


                  <div class="form-group">
                      <input class="form-control" name="TelefonoVoluntarioWeb" type="text" placeholder="Teléfono *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                      <input class="form-control" name="NacionalidadVoluntarioWeb" type="text" placeholder="Nacionalidad *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <input class="form-control" name="OcupacionWeb" type="text" placeholder="Ocupación *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <input class="form-control" name="PatologiaWeb" type="text" placeholder="Patología *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12">
          <span  class="copyright">Copyright &copy; SIME 2019</span>
        </div>
      </div>
    </div>
  </footer>
  <!-- Portfolio Modals -->

  <!-- Modal 1 -->
  @foreach ($noticias as $item)
  <div class="portfolio-modal modal fade" id="por{{$item->IdNoticias}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">{{$item->Titulo}}</h2>
                  <p class="item-intro text-muted"></p>
                  @if($item->Imagenes != null)
                  <img class="img-fluid d-block mx-auto" src='img/{{$item->Imagenes}}' alt="" width="600" height="300">
                  @endif
                  <p>{{$item->Articulo}}</p>
                  @if($item->Videos != null)
                <span>Link del video: </span> <a style="color:black" href="{{$item->Videos}}">{{$item->Videos}}</a></p>
                 @endif
                  <ul class="list-inline">
                    <li>Fecha de publicación: {{$item->updated_at}}</li>
                    <li>Autor: {{$item->user->name}} {{$item->user->Apellido1}}</li>
                    @if($item->PDF != null)
                    <li>
                      <a class="btn btn-primary"
                    href='PDF/{{$item->PDF}}' type="application/pdf" download ="{{$item->NombrePDF}}"></object>
                      Decargar PDF<a>
                    </li>
                    @endif
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @endforeach
  <script src="{{asset("assets/MAP/leaflet.js")}}"></script>
  <script>
    var mymap = L.map('mapid').setView([9.9789728,-85.6605546], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11'
    }).addTo(mymap);
    var mymap2 = L.map('mapid2').setView([9.9789728,-85.6605546], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      maxZoom: 18,
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11'
    }).addTo(mymap2);
    </script>
<script type="text/javascript">
window.onload = function() {
  const albergue = new XMLHttpRequest();
  const emergencia = new XMLHttpRequest();
  emergencia.open('GET','Emergencia/EM',true);
  emergencia.send();
  emergencia.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
   let lglt = JSON.parse(this.responseText);
   for(let item of lglt){
    var Albergue = L.icon({
          iconUrl:      '../assets/MAP/images/Albergue.png',
          iconSize:     [30, 30],
  });
  if(item.Categoria == "Grave"){
  var circ = L.circle([item.Latitud,item.Longitud], { color: 'red',
fillColor: '#f03',
fillOpacity: 0.5,radius: item.Radio }).addTo(mymap2);
    circ.bindPopup("Nombre: "+item.Nombre+" "+"Categoria: "+item.Categoria+" "+"Radio: "+item.Radio).openPopup();
   }
   if(item.Categoria == "Moderada"){
  var circ = L.circle([item.Latitud,item.Longitud], { color: 'orange',
fillColor: 'orange',
fillOpacity: 0.5,radius: item.Radio }).addTo(mymap2);
    circ.bindPopup("Nombre: "+item.Nombre+" "+"Categoria: "+item.Categoria+" "+"Radio: "+item.Radio).openPopup();
   }
   if(item.Categoria == "Leve"){
  var circ = L.circle([item.Latitud,item.Longitud], { color: 'green',
fillColor: 'green',
fillOpacity: 0.5,radius: item.Radio }).addTo(mymap2);
    circ.bindPopup("Nombre: "+item.Nombre+" "+"Categoria: "+item.Categoria+" "+"Radio: "+item.Radio).openPopup();
   }
   }
  }
}
  albergue.open('GET','Albergue/AL',true);
  albergue.send();
  albergue.onreadystatechange = function(){

if(this.readyState == 4 && this.status == 200){
   let lglt = JSON.parse(this.responseText);
   //console.log(lglt);
   for(let item of lglt){
    var AlbergueV = L.icon({
          iconUrl:      '../assets/MAP/images/AlbergueV.png',
          iconSize:     [50, 50],
  });
  var AlbergueR = L.icon({
        iconUrl:      '../assets/MAP/images/AlbergueR.png',
        iconSize:     [50, 50],
});

if(item.Estado =="Activa"){
  var mark = L.marker([item.Latitud,item.Longitud],{icon: AlbergueV}).addTo(mymap);
    mark.bindPopup("Nombre del albergue: "+item.Nombre+", "+"Total personas: "+item.PersonasAlbergue+", "+"Capacidad: "+item.Capacidad+", "+"Teléfono: "+item.telefono).openPopup();
  }
  else {
    var mark = L.marker([item.Latitud,item.Longitud],{icon: AlbergueR}).addTo(mymap);
      mark.bindPopup("Nombre del albergue: "+item.Nombre+", "+"Total personas: "+item.PersonasAlbergue+", "+"Capacidad: "+item.Capacidad+", "+"Teléfono: "+item.telefono).openPopup();
  }
}
  }
}
};
</script>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('assets/Index/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/Index/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('assets/Index/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Contact form JavaScript -->
  <script src="{{asset('assets/Index/js/jqBootstrapValidation.js')}}"></script>
  <script src="{{asset('assets/Index/js/contact_me.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('assets/Index/js/agency.min.js')}}"></script>
<script src="{{asset("assets/js/scripts.js")}}"></script>
</body>

</html>
