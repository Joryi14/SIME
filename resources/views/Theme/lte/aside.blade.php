  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
        <ul class="list-group panel"> 
          @role('Admin')
          <li>
            <a href="#demo7" class="list-group-item " data-toggle="collapse">
              <i class="fa fa-users"></i> <span>Control de usuarios</span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <li class="collapse" id="demo7">
              <a class="list-group-item" href="{{route('inicio_usuario')}}"><i class="fa fa-circle-o"></i>Usuarios</a>
              <a class="list-group-item" href="{{ route('inicio_Rol')}}"><i class="fa fa-circle-o"></i>Roles</a>
              <a class="list-group-item" href="{{ route('inicio_UR')}}"><i class="fa fa-circle-o"></i>Asignar roles a usuarios</a>
            </li>
          </li>
          @endrole
          @role('Voluntario|Admin')
            <li>
              <a href="#demo4" class="list-group-item " data-toggle="collapse">
                <i class="fa fa-globe"></i><span>Módulo de censo</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <li class="collapse" id="demo4">
                <a class="list-group-item" href="{{ route('inicio_jefe') }}"><i class="fa fa-circle-o"></i> Jefe de familia</a>
                <a class="list-group-item" href="{{ route('inicio_familia')}}"><i class="fa fa-circle-o"></i> Familias</a>
                <a class="list-group-item" href="{{ route('inicio_censo')}}"><i class="fa fa-circle-o"></i> Censo</a>
              </li>
            </li>
          @endrole
          @role('Admin|Director|Lider Comunal')
          <li>
            <a href="#demo3" class="list-group-item " data-toggle="collapse"> <i class="fa  fa-exclamation-triangle"></i><span>Módulo de emergencia</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span></a>
            <div class="collapse" id="demo3">
              <a class="list-group-item" href="{{route('emergencia_create')}}"><i class="fa fa-exclamation-triangle"></i>Crear emergencia</a>
              <a class="list-group-item" href="{{route('inicio_mensaje')}}"><i class="fa  fa-envelope"></i><span>Mensajería</span></a>
              <a class="list-group-item" href="{{route('inicio_albergue')}}"><i class="fa  fa-hospital-o"></i><span>Albergue</span></a>
              <a class="list-group-item" href="{{route('inicio_inventario')}}"><i class="fa  fa-database"></i><span>Inventario</span></a>
              <a href="#SubMenu1" class="list-group-item" data-toggle="collapse"><i class="fa  fa-truck">
              </i><span>Módulo de entrega</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
              <div class="collapse list-group-submenu" id="SubMenu1">
                <a class="list-group-item" href="{{route('inicio_EntregaDonaciones2')}}"><i class="fa  fa-list"></i><span>Lista de entrega</span></a>
                <a class="list-group-item" href="{{route('EntregaDonaciones_create')}}"><i class="fa  fa-plus"></i><span>Crear entrega</span></a>
              </div>
              <a  class="list-group-item" href="{{route('inicio_EntregaDonacionesA')}}"><i class="fa fa-user"></i><span>Entrega albergue</span></a>
              <a class="list-group-item" href="{{route('inicio_personasAlbergue')}}"><i class="fa  fa-child"></i><span>Personas en albergue</span></a>
              <a href="#SubMenu2" class="list-group-item" data-toggle="collapse"><i class="fa  fa-cubes">
              </i><span>Módulo retiro de paquetes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span></a>
              <div class="collapse list-group-submenu" id="SubMenu2">
                <a class="list-group-item" href="{{route('inicio_Retiro_PaquetesV')}}"><i class="fa fa-list "></i><span>Lista de retiro</span></a>
                <a class="list-group-item" href="{{route('Retiro_PaquetesV_create')}}"><i class="fa  fa-plus"></i><span>Crear retiro</span></a>
                </div>
            </div>
          </li>
          <li class="list-group-item"><a href="{{route('inicio_emergencia')}}"><i class="fa  fa-list"></i><span>  Lista de emergencias</span></a></li>
          <li class="list-group-item"><a href="{{route('inicio_EntregaDonaciones')}}"><i class="fa  fa-truck"></i><span>Entrega de donaciones</span></a></li>
          <li class="list-group-item"><a href="{{route('inicio_voluntarioweb')}}"><i class="fa fa-users"></i> <span>Inscripción voluntarios</span></a></li>
          @endrole
          @role('Admin|Autor')
          <li class="list-group-item"><a href="{{route('inicio_noticia')}}"><i class="fa fa-newspaper-o"></i> <span>Noticias</span></a></li>
          @endrole
        </ul>
      </div>