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
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset("assets/Index/css/agency.min.css")}}" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Home</a>
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
            <a class="nav-link js-scroll-trigger" href="#contact">Inscripcion de voluntarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
        </ul>
      </div>
    </div>
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
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-phone-alt fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Telefonos</h4>
          <p class="text-muted">83483924</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Email</h4>
          <p class="text-muted">nosaraemergencias@gmail.com </p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class= "fas fa-map-marked-alt fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Dirección</h4>
          <p class="text-muted">300mts sur del EBAIS de Nosara, oficinas de la ADIN. Reuniones todos los viernes que la primera semana de cada mes.
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
          <h3 class="section-subheading text-muted">Todas la novedades de la comunidad de Nosara.</h3>
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
          <img class="img-fluid" src="img/{{$item->Imagenes}}" width="400" height="300" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>{{$item->Titulo}}</h4>
            <p class="text-muted">{{$item->IdAutor}}</p>
          </div>
        </div>
        @endforeach

         
      
      </div>
      
    </div>
  </section>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">About</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="{{asset('img/about/1.jpg')}}" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>2009-2011</h4>
                  <h4 class="subheading">Our Humble Beginnings</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="{{asset('plan/img/about/2.jpg')}}" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>March 2011</h4>
                  <h4 class="subheading">An Agency is Born</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="{{asset('plan/img/about/3.jpg')}}" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>December 2012</h4>
                  <h4 class="subheading">Transition to Full Service</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="{{asset('plan/img/about/4.jpg')}}" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>July 2014</h4>
                  <h4 class="subheading">Phase Two Expansion</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="{{asset('plan/img/team/1.jpg')}}" alt="">
            <h4>Kay Garland</h4>
            <p class="text-muted">Lead Designer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="{{asset('plan/img/team/2.jpg')}}" alt="">
            <h4>Larry Parker</h4>
            <p class="text-muted">Lead Marketer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="{{asset('plan/img/team/3.jpg')}}" alt="">
            <h4>Diana Pertersen</h4>
            <p class="text-muted">Lead Developer</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Clients -->
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('plan/img/logos/envato.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('plan/img/logos/designmodo.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('plan/img/logos/themeforest.jpg')}}" alt="">
          </a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="#">
            <img class="img-fluid d-block mx-auto" src="{{asset('plan/img/logos/creative-market.jpg')}}" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Formulario de inscripción</h2>
          <h3 class="section-subheading text-muted">.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form class="form-horizontal" method="POST" action="/VoluntarioWeb/store" >
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                    
                  <input class="form-control" name="NombreVoluntarioWeb" type="text" placeholder="Nombre *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>

                <div class="form-group">
                  <input class="form-control" name="ApellidoVoluntario1Web" type="text" placeholder="1er Apellido *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="ApellidoVoluntario2Web" type="text" placeholder="2do Apellido *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                    <input class="form-control" name="CedulaVoluntarioWeb" type="text" placeholder="# Identificación *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
          

                  <div class="form-group">
                      <input class="form-control" name="TelefonoVoluntarioWeb" type="text" placeholder="Telefono *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                      <input class="form-control" name="NacionalidadVoluntarioWeb" type="text" placeholder="Nacionalidad *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <input class="form-control" name="OcupacionWeb" type="text" placeholder="Ocupacion *" required="required" data-validation-required-message="Please enter your phone number.">
                      <p class="help-block text-danger"></p>
                  </div>

                  <div class="form-group">
                      <input class="form-control" name="PatologiaWeb" type="text" placeholder="Patologia *" required="required" data-validation-required-message="Please enter your phone number.">
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
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
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
                  <img class="img-fluid d-block mx-auto" src="img/{{$item->Imagenes}}" alt="" width="600" height="300">

                  <p>{{$item->Articulo}}</p>
                  
                <video width="600" height="300" controls>
                 <source src="Vide/{{$item->Videos}}" type="video/mp4">
                 </video>
                  <ul class="list-inline">
                    <li>Fecha de publicacion: {{$item->updated_at}}</li>
                    <li>Autor: {{$item->IdAutor}}</li>
                    <li>Archivo PDF:   <a href="PD/{{$item->PDF}}" class="btn btn-primary">Descargar<a></li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @endforeach


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

</body>

</html>
