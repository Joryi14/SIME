  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
        <ul class="list-group panel"> 
          @role('Admin|Director')
          <li>
            <a href="#demo7" class="list-group-item " data-toggle="collapse">
              <i class="fa fa-users"></i><span>Control de usuarios</span><span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <li class="collapse" id="demo7">
              <a class="list-group-item child" href="{{route('inicio_usuario')}}"><i class="fa fa-circle-o"></i><em>Usuarios</em></a>
              <a class="list-group-item child" href="{{ route('inicio_Rol')}}"><i class="fa fa-circle-o"></i><em>Roles</em></a>
              <a class="list-group-item child" href="{{ route('inicio_UR')}}"><i class="fa fa-circle-o"></i><em>Asignar roles a usuarios</em></a>
            </li>
          </li>
          @endrole
          @role('Director|Admin|Censo')
            <li>
              <a href="#demo4" class="list-group-item " data-toggle="collapse">
                <i class="fa fa-globe"></i><span>Módulo de censo</span><span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              @role('Director|Admin|Censo')
              <li class="collapse" id="demo4">  
                <a class="list-group-item child" href="{{ route('inicio_jefe') }}"><i class="fa fa-circle-o"></i><em>Jefe de familia</em></a>
                <a class="list-group-item child" href="{{ route('inicio_familia')}}"><i class="fa fa-circle-o"></i><em>Familias</em></a>
                <a class="list-group-item child" href="{{ route('inicio_censo')}}"><i class="fa fa-circle-o"></i><em>Censo</em></a>
              </li>
              @endrole
            </li>
            @role('Director|Admin')
            <li class="list-group-item"><a  href="{{route('inicio_emergencia')}}"><i class="fa fa-exclamation-triangle"></i><b>Emergencias</b></a></li>
            @endrole
          @endrole
          @role('Admin|Director|Lider Comunal')
          <li class="list-group-item"><a  href="{{route('inicio_mensaje')}}"><i class="fa  fa-envelope"></i><span>Mensajería</span></a></li>
          <li class="list-group-item"><a  href="{{route('inicio_albergue')}}"><i class="fa  fa-hospital-o"></i><span>Albergue</span></a></li>
          @endrole
          @role('Admin|Director|Voluntario|Administrador de Inventario')
          <li>
            <a href="#demo3" class="list-group-item" data-toggle="collapse"> <i class="fa  fa-exclamation-triangle"></i><span>Módulo de emergencia</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span></a>
            <div class="collapse" id="demo3">
              @role('Admin|Director')
              <a class="list-group-item child" href="{{route('emergencia_create')}}"><i class="fa fa-exclamation-triangle"></i><em>Crear emergencia</em></a>
              @endrole
              @role('Admin|Director|Voluntario')
              <a class="list-group-item child" href="{{route('inicio_personasAlbergue2')}}"><i class="fa  fa-child"></i><span><em>Personas en albergue</em></span></a>
              <a class="list-group-item child" href="{{route('inicio_EntregaDonaciones2')}}"><i class="fa fa-truck"></i><span><em>Entrega de donaciones</em></span></a>
              <a  class="list-group-item child" href="{{route('inicio_EntregaDonacionesAF')}}"><i class="fa fa-user"></i><span><em>Entrega albergue</em></span></a>
              @endrole
              @role('Admin|Director|Administrador de Inventario')
              <a class="list-group-item child" href="{{route('inicio_inventario2')}}"><i class="fa  fa-database"></i><span><em>Inventario</em></span></a>
              <a class="list-group-item child" href="{{route('inicio_Retiro_PaquetesV2')}}"><i class="fa  fa-cubes"></i><span><em>Retiro de paquetes</em></span></a>  
              @endrole  
            </div>
          </li>
          @endrole
          @role('Admin|Director')
          <li>
            <a href="#demo5" class="list-group-item" data-toggle="collapse"> <i class="fa  fa-list"></i><span>Módulo de datos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span></a>
            <div class="collapse" id="demo5">    
          <a class="list-group-item child" href="{{route('inicio_inventario')}}"><i class="glyphicon glyphicon-list-alt"></i><span><em>Lista de Inventarios</em></span></a>
          <a class="list-group-item child" href="{{route('inicio_Retiro_PaquetesV')}}"><i class="glyphicon glyphicon-list-alt"></i><span><em>Lista retiro de paquetes</em></span></a>
          <a class="list-group-item child" href="{{route('inicio_personasAlbergue')}}"><i class="glyphicon glyphicon-list-alt"></i><span><em>Lista de personas en albergue</em></span></a>
          <a class="list-group-item child" href="{{route('inicio_EntregaDonaciones')}}"><i class="glyphicon glyphicon-list-alt"></i><span><em>Lista de entrega de donaciones</em></span></a>
          <a class="list-group-item child" href="{{route('inicio_EntregaDonacionesA')}}"><i class="glyphicon glyphicon-list-alt"></i><span><em>Lista de entrega albergue</em></span></a>
        </li>
        @endrole
       @role('Admin|Director|Voluntario')
       <li class="list-group-item"><a  href="{{route('inicio_voluntarioweb')}}"><i class="fa fa-users"></i> <span>Inscripción voluntarios</span></a></li>
       @endrole   
       @role('Admin|Autor|Director')
          <li class="list-group-item"><a href="{{route('inicio_noticia')}}"><i class="fa fa-newspaper-o"></i><span>Noticias</span></a></li>
       @endrole
        </ul>
      </div>