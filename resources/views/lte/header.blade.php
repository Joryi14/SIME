 <nav role="navigation" class="navbar navbar-custom">
  <div class="container-fluid">
  <div class="navbar-header">
    <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="/" class="navbar-brand">SIME</a>
  </div> 
        <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            @role('Director|Admin') 
            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              @if(auth()->user()->unreadNotifications->count())
              <span class="label label-pill label-danger count"> 
                {{auth()->user()->unreadNotifications->count()}}
              </span>   
              @endif   
              <span class="glyphicon glyphicon-bell"></span></a>
              <ul class="dropdown-menu">
                @foreach (auth()->user()->unreadNotifications as $noti )
              <li><a style="display:inline;color:#434A54; background-color:lightgrey;"  href="/notifications/{{$noti->id}}"><b>
                  {{$noti->data['name']}} {{$noti->data['Cedula']}} {{$noti->data['email']}} 
                    {{$noti->data['data']}}**</b>
                    <form style="display:inline" action="{{route('noti_del', ['id' => $noti->id])}}" method="POST">
                      @csrf
                      <input name="_method" type="hidden" value="DELETE">
                      <button  id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar">
                          <i class="glyphicon glyphicon-remove"></i>
                        </button>
                      </form> </a>
                </li>
                @endforeach
                @foreach (auth()->user()->readNotifications as $noti )
                <li><a style="display:inline;" href="user">
                  {{$noti->data['name']}} {{$noti->data['Cedula']}} {{$noti->data['email']}} 
                    {{$noti->data['data']}} 
                <form style="display:inline" action="{{route('noti_del', ['id' => $noti->id])}}" method="POST">
                  @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button  id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar">
                      <i class="glyphicon glyphicon-remove"></i>
                    </button>
                  </form></a>
                </li>
                @endforeach
              </ul>
            </li>
            @endrole
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-user"></i><b class="caret"></b></a>
              <ul role="menu" class="dropdown-menu">
                <li class="dropdown-header">     
                  <a href="/user/show">Perfil</a>
                </li>
                <li><a href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Desconectar</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                </li>
              </ul>
            </li>
          </ul>
          </div>
  </div>
</nav>