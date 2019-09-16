@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-10">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('albergue_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Albergue
                </a>
            </div>
            
          <h3 class="box-title">Albergue</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>Id del albergue</th>
              <th>Nombre del albergue</th>
              <th>Distrito</th>
              <th>Comunidad</th>
              <th>Tipo de la instalacion</th>
              <th>Capacidad del lugar</th>
              <th>Cedula del responsable</th>
              <th>Telefono</th>
              <th>Duchas</th>
              <th>Inodoros</th>
              <th>Espacios de cocina</th>
              <th>Bodega</th>
              <th>Longitud</th>
              <th>Latitud</th>
              <th>Nececidades</th>
              </tr>
            @foreach ($albergue as $item)
              <tr>
              <td>{{$item->idAlbergue}}</td>    
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Distrito}}</td>
              <td>{{$item->Comunidad}}</td>
              <td>{{$item->TipoDeInstalacion}}</td>
              <td>{{$item->Capacidad}}</td>
              <td>{{$item->IdResponsable}}</td>
              <td>{{$item->telefono}}</td>
              <td>{{$item->Duchas}}</td>
              <td>{{$item->inodoros}}</td>
              <td>{{$item->EspacioDeCocina}}</td>
              <td>{{$item->Bodega}}</td>
              <td>{{$item->Longitud}}</td>
              <td>{{$item->Latitud}}</td>
              <td>{{$item->Nececidades}}</td>
              <td><a href="/Albergue/{{$item->idAlbergue}}/edit" class="btn-accion-tabla tooltipsC" title="Editar albergue">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form action="{{route('albergue_delete', ['Albergue' => $item->idAlbergue])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar albergue">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection