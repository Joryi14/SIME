<aside class="main-sidebar">     
 <section class="sidebar">
          <ul class="sidebar-menu"  data-widget="tree">
              <li class="header">Menu</li>
          @role('Admin')
              <li><a href="{{route('inicio_usuario')}}"><i class="fa fa-users"></i> <span>Control de Usuarios</span></a></li>
          @endrole
          @role('Voluntario|Admin')
            <li class="treeview">
              <a href="#">
                <i class="fa fa-globe"></i><span>Modulo de Censo</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ route('inicio_jefe') }}"><i class="fa fa-circle-o"></i> Jefe de Familia</a></li>
                <li><a href="{{ route('inicio_familia')}}"><i class="fa fa-circle-o"></i> Familias</a></li>
                <li><a href="{{ route('inicio_censo')}}"><i class="fa fa-circle-o"></i> Censo</a></li>
              </ul>
            </li>
          @endrole
          @role('Admin|Director|Lider Comunal')
          <li><a href="{{route('inicio_emergencia')}}"><i class="fa  fa-exclamation-triangle"></i><span> Emergencia</span></a></li>
          <li><a href="{{route('inicio_mensaje')}}"><i class="fa  fa-envelope"></i><span>Mensajeria</span></a></li>
          <li><a href="{{route('inicio_albergue')}}"><i class="fa  fa-hospital-o"></i><span>Albergue</span></a></li>
          <li><a href="{{route('inicio_inventario')}}"><i class="fa  fa-database"></i><span>Inventario</span></a></li>
          <li><a href="{{route('inicio_EntregaDonaciones')}}"><i class="fa  fa-truck"></i><span>Entrega de donaciones</span></a></li>
          <li><a href="{{route('inicio_EntregaDonacionesA')}}"><i class="fa  fa-user-plus"></i><span>Entrega donaciones albergue</span></a></li>
          <li><a href="{{route('inicio_personasAlbergue')}}"><i class="fa  fa-child"></i><span>Personas en Albergue</span></a></li>
          <li><a href="{{route('inicio_Retiro_PaquetesV')}}"><i class="fa   fa-cubes"></i><span>Retiro de Paquetes</span></a></li>
          @endrole
          <li><a href="{{route('inicio_noticia')}}"><i class="fa fa-newspaper-o"></i> <span>Noticias</span></a></li>
          <li><a href="{{route('inicio_voluntarioweb')}}"><i class="fa fa-users"></i> <span>Inscripción de voluntarios</span></a></li>
        </ul>
        </section>
      </aside>
