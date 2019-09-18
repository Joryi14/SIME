<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form>
          @role('Admin')
          <ul class="sidebar-menu" data-widget="tree">
              <li><a href="{{route('inicio_usuario')}}"><i class="fa fa-users"></i> <span>Control de Usuarios</span></a></li>
              @endrole
              @role('Voluntario|Admin')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-globe"></i> <span>Modulo de Censo</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('inicio_jefe') }}"><i class="fa fa-circle-o"></i> Jefe de Familia</a></li>
                <li><a href="{{ route('inicio_familia')}}"><i class="fa fa-circle-o"></i> Familias</a></li>
                <li><a href="{{ route('inicio_censo')}}"><i class="fa fa-circle-o"></i> Censo</a></li>
              </ul>
            </li>@endrole 
          <li><a href="{{route('inicio_emergencia')}}"><i class="fa   fa-exclamation-triangle"></i> <span>Emergencia</span></a></li>
          @role('Director|Admin|Lider Comunal')
          <li><a href="{{route('inicio_mensaje')}}"><i class="fa  fa-envelope"></i> <span>Mensajeria</span></a></li>
          @endrole 
          <li><a href="{{route('inicio_albergue')}}"><i class="fa  fa-hospital-o"></i> <span>Albergue</span></a></li>
          </ul>
        </section>
      </aside>
    