<header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <span class="logo-mini"><b>SI</b>ME</span>
          <span class="logo-lg"><b>SIME</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
    
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                        {{ Auth::user()->name }}
                    </p>
                  </li>
                    <li class="user-body">
                  <!-- Menu Footer-->
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Datos de usuario</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ route('logout')}}" class="btn btn-default btn-flat"
                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Desconectar
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                                      </form>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>