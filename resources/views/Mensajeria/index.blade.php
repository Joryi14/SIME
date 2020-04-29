@extends("theme/$theme/layout")
@section('Script')
@endsection
@section('Contenido')
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="content-row-title">Informes de incidentes
            <a href="{{route('Mensajeria_create')}}" class="btn btn-success btn-lg pull-right">
              <i class="fa fa-plus-circle"></i> Crear
          </a></h4>
          <br>
          </div>
        </div>
  @foreach ($mensajerias as $item)
     <div class="panel panel-info">
            <div class="panel-heading"> Este reporte fue enviado en la fecha y hora: {{$item->created_at}}
            </div>
                  <div class="panel-body">
                    <p><strong>Id Mensajería:</strong> {{$item->IdMensajeria}}</p>
                    <p><strong>Código de incidente:</strong> {{$item->CodigoIncidente}}</p>
                       <p><strong>Descripción:</strong>  {{$item->Descripcion}}</p>
                      <p><strong>Ubicación:</strong>  {{$item->Ubicacion}}</p>
                    <p><strong>Hora:</strong>   {{$item->Hora}}</p>
                       <p><strong>Fecha: </strong>{{\Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}} </p>
                      <p><strong>Categoría:</strong>   {{$item->Categoria}}</p>
                         <p><strong>Id del líder comunal:</strong>  {{$item->LiderComunal->Cedula}}  {{$item->LiderComunal->name}}  {{$item->LiderComunal->Apellido1}}</p>
                         <p><strong>Emergencia: </strong>{{$item->idEmergencia}} {{$item->Emergencia->NombreEmergencias}} </p>
                         <td><a href="/Mensajeria/{{$item->IdMensajeria}}/edit" class="btn-accion-tabla tooltipsC" title="Editar informe">
                          <i class="fa fa-fw fa-pencil text-success"></i></a>
                          <form action="{{route('mensajeria_delete', ['Mensajeria' => $item->IdMensajeria])}}" id="form1" method="POST">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar informe" onclick="confirmarEnvio()">
                                  <i class="fa fa-fw fa-trash text-danger"></i>
                              </button>
                          </form>
                         </td>
                          <th><th>
                   </div>
        </div>
        @endforeach
@endsection
