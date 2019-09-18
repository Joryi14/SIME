@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('emergencia_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Emergencia
                </a>
            </div>
            
          <h3 class="box-title">Emergencias</h3>
        </div>
        <!-- /.box-header -->
        <div class="table table-bordered table-striped" id="tabla-data">
          <table class="table table-hover">
              <thead>
            <tr>
              <th>Id de la Emergencia</th>
              <th>Nombre de la Emergencias</th>
              <th>Categoria</th>
              <th>Tipo De Emergencia</th>
              <th>Descripcion</th>
              <th>Longitud</th>
              <th>Latitud</th>
            </tr>
          </thead>
            @foreach ($emergencias as $item)
              <tr>
              <td>{{$item->idEmergencias}}</td>    
              <td>{{$item->NombreEmergencias}}</td>
              <td>{{$item->Categoria}}</td>
              <td>{{$item->TipoDeEmergencia}}</td>
              <td>{{$item->Descripcion}}</td>
              <td>{{$item->Longitud}}</td>
              <td>{{$item->Latitud}}</td>
              <td><a href="/Emergencia/{{$item->idEmergencias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar emergencia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form action="{{route('emergencia_delete', ['Emergencias' => $item->idEmergencias])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar emergencia">
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