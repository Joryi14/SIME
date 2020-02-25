<aside class="main-sidebar">     
 <section class="sidebar">
          <ul class="sidebar-menu"  data-widget="tree"> 
          @role('Admin')
              <li><a href="{{route('inicio_usuario')}}"><i class="fa fa-users"></i> <span>Control de usuarios</span></a></li>
          @endrole
          @role('Voluntario|Admin')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-globe"></i><span>Módulo de censo</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('inicio_jefe') }}"><i class="fa fa-circle-o"></i> Jefe de familia</a></li>
                <li><a href="{{ route('inicio_familia')}}"><i class="fa fa-circle-o"></i> Familias</a></li>
                <li><a href="{{ route('inicio_censo')}}"><i class="fa fa-circle-o"></i> Censo</a></li>
              </ul>
            </li>
          @endrole
          @role('Admin|Director|Lider Comunal')
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-exclamation-triangle"></i><span>Módulo de emergencia</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ route('emergencia_create')}}"><i class="fa fa-exclamation-triangle"></i>  Crear emergencia</a></li>
              <li><a href="{{route('inicio_mensaje')}}"><i class="fa  fa-envelope"></i><span>Mensajería</span></a></li>
              <li><a href="{{route('inicio_albergue')}}"><i class="fa  fa-hospital-o"></i><span>Albergue</span></a></li>
              <li><a href="{{route('inicio_inventario')}}"><i class="fa  fa-database"></i><span>Inventario</span></a></li>
              <li class="treeview">
                <a href="#">
                  <i class="fa  fa-truck">
                    </i><span>Módulo de entrega</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
              <ul class="treeview-menu">
              <li><a href="{{route('inicio_EntregaDonaciones2')}}"><i class="fa  fa-list"></i><span>Lista de entrega</span></a></li>
              <li><a href="{{route('EntregaDonaciones_create')}}"><i class="fa  fa-plus"></i><span>Crear entrega</span></a></li>
              </ul>
              </li>
              <li><a href="{{route('inicio_EntregaDonacionesA')}}"><i class="fa  fa-user-plus"></i><span>Entrega albergue</span></a></li>
              <li><a href="{{route('inicio_personasAlbergue')}}"><i class="fa  fa-child"></i><span>Personas en albergue</span></a></li>
              <li><a href="{{route('inicio_Retiro_PaquetesV')}}"><i class="fa   fa-cubes"></i><span>Retiro de paquetes</span></a></li>
            </ul>
          </li>
          <li><a href="{{route('inicio_emergencia')}}"><i class="fa  fa-list"></i><span>  Lista de emergencias</span></a></li>
          <li><a href="{{route('inicio_EntregaDonaciones')}}"><i class="fa  fa-truck"></i><span>Entrega de donaciones</span></a></li>
          <li><a href="{{route('inicio_voluntarioweb')}}"><i class="fa fa-users"></i> <span>Inscripción voluntarios</span></a></li>
          @endrole
          @role('Admin|Autor')
          <li><a href="{{route('inicio_noticia')}}"><i class="fa fa-newspaper-o"></i> <span>Noticias</span></a></li>
          @endrole
        </ul>
        </section>
      </aside>