@extends("theme/$theme/layout") @section('Script') @endsection
@section('Contenido')
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="content-row-title">Informes de incidentes
            <a
                href="{{route('Mensajeria_create')}}"
                class="btn btn-success btn-lg pull-right">
                <i class="fa fa-plus-circle"></i>
                Crear
            </a>
        </h4>
        <br>
        <div class="row">

            <form action="/search" method="GET">
                <div class="col-md-2">
                    <input type="search" name="buscar" class="form-control">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-warning">buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($mensajerias as $item)
<div class="panel panel-info">
    <div class="panel-heading">
        Este reporte fue enviado en la fecha y hora:
        {{$item->created_at}}
    </div>
    <div class="panel-body">
      <div class="col-md-3">
        <p>
            <strong>Id Mensajería:</strong>
            {{$item->IdMensajeria}}</p>
        <p>
            <strong>Código de incidente:</strong>
            {{$item->CodigoIncidente}}</p>
        <p>
            <strong>Descripción:</strong>
            {{$item->Descripcion}}</p>
        <p>
            <strong>Hora:</strong>
            <input
                type="time"
                value="{{$item->Hora}}"
                readonly="readonly"
                style="border:0px">
        </p>
        <p>
            <strong>Fecha:
            </strong>{{\Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}}
        </p>
        <p>
            <strong>Categoría:</strong>
            {{$item->Categoria}}</p>
        <p>
            <strong>Líder comunal:</strong>
            {{$item->LiderComunal->Cedula}}
            {{$item->LiderComunal->name}}
            {{$item->LiderComunal->Apellido1}}</p>
        <td>
            <a
                href="/Mensajeria/{{$item->IdMensajeria}}/edit"
                class="btn-accion-tabla tooltipsC"
                title="Editar informe">
                <i class="fa fa-fw fa-pencil text-success"></i>
            </a>
            <form style="display: inline"
                action="{{route('mensajeria_delete', ['Mensajeria' => $item->IdMensajeria])}}"
                id="form1"
                method="POST">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button
                    id="btneliminar"
                    type="submit"
                    class="btn-accion-tabla tooltipsC"
                    title="Eliminar informe"
                    onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
            </form>
            <a
                href="/Mensajeria/{{$item->IdMensajeria}}/accion"
                class="btn-accion-tabla tooltipsC"
                title="Añadir acción">
                <i class="fa fa-fw fa-plus text-warning"></i>
            </a>
        </td>
      </div>
        <div class="col-md-9">
        <div class="panel">
          <h5>Acciones</h2>
        <div class="tabbable tabs-left clearfix">
            <ul id="myTab1" class="nav nav-tabs">
                @foreach ($item->Accion as $accion)
                <li class="">
                    <a href="#home{{$accion->id}}" data-toggle="tab">{{$accion->titulo}}</a>
                </li>
                @endforeach
            </ul>
            <div id="myTabContent" class="tab-content">
            @foreach ($item->Accion as $AccionD)
                <div class="tab-pane fade" id="home{{$AccionD->id}}">
                    <p>{{$AccionD->descripcion}}</p>
                </div>
            @endforeach
          </div>
        </div>
      </div>
      <a href="/Mensajeria/{{$item->Longitud}}/{{$item->Latitud}}/ubicacion"
      class="btn-accion-tabla tooltipsC"
      title="Añadir acción" target="_blank">
      <i class="glyphicon glyphicon-map-marker text-warning"><b> Ubicación</b></i>
      </a>
    </div>
    </div>
</div>
@endforeach
@endsection