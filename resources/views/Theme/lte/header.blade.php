<header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
          <span class="logo-mini"><b>SI</b>ME</span>
          <span class="logo-lg"><b>SIME</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu">
                  <li>     
                    <a href="/user/show" class="btn btn-default btn-flat">Perfil</a>
                    <a href="{{ route('logout')}}" class="btn btn-default btn-flat" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Desconectar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                  </li>
                      </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>