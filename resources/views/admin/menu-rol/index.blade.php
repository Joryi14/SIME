@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/menu-rol/index.js")}}" type="text/javascript"></script>
@endsection

@section('Contenido')
<div class="row">
    <div class="col-xs-8">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Menu Roles</h3>
        </div>
        <div class="box-body table-responsive no-padding" >
          <table class="table table-hover" id="tabla-data">
        <thead>
            <tr>
              <th>Menu</th>
              @foreach ($rols as $item =>$NombreRol)
                  <th>{{$NombreRol}}</th>
              @endforeach
            </tr>
        </thead>
        <tbody>
                @foreach ($menus as $key => $menu)
                @if ($menu["idMenu"] != 0)
                    @break
                @endif
                    <tr>
                        <td class="font-weight-bold"><i class="fa fa-arrows-alt"></i> {{$menu["nombre"]}}</td>
                        @foreach($rols as $id => $NombreRol)
                            <td class="text-center">
                                <input
                                type="checkbox"
                                class="menu_rol"
                                name="menu_rol[]"
                                data-menuid={{$menu[ "id"]}}
                                value="{{$id}}" {{in_array($id, array_column($menusRols[$menu["id"]], "id"))? "checked" : ""}}>
                            </td>
                        @endforeach
                    </tr>
                    @foreach($menu["submenu"] as $key => $hijo)
                        <tr>
                            <td class="pl-20"><i class="fa fa-arrow-right"></i> {{ $hijo["nombre"] }}</td>
                            @foreach($rols as $id => $nombre)
                                <td class="text-center">
                                    <input
                                    type="checkbox"
                                    class="menu_rol"
                                    name="menu_rol[]"
                                    data-menuid={{$hijo["id"]}}
                                    value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo["id"]], "id"))? "checked" : ""}}>
                                </td>
                            @endforeach
                        </tr>
                        @foreach ($hijo["submenu"] as $key => $hijo2)
                            <tr>
                                <td class="pl-30"><i class="fa fa-arrow-right"></i> {{$hijo2["nombre"]}}</td>
                                @foreach($rols as $id => $nombre)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="menu_rol"
                                        name="menu_rol[]"
                                        data-menuid={{$hijo2[ "id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo2["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                            @foreach ($hijo2["submenu"] as $key => $hijo3)
                                <tr>
                                    <td class="pl-40"><i class="fa fa-arrow-right"></i> {{$hijo3["nombre"]}}</td>
                                    @foreach($rols as $id => $nombre)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="menu_rol"
                                        name="menu_rol[]"
                                        data-menuid={{$hijo3[ "id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($menusRols[$hijo3["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
        </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection