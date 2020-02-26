 <nav role="navigation" class="navbar navbar-custom">
          <div class="container-fluid">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        <a href="/" class="navbar-brand">SIME</a>
        <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
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