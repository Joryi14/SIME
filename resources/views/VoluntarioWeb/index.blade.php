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
               
            </div>
            
          <h3 class="box-title">Incripciones web de voluntarios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>1er Apellido</th>
              <th>2do Apellido</th>
              <th>Cedula</th>
              <th>Telefono</th>
              <th>Nacionalidad</th>
              <th>Ocupacion</th>
              <th>Patologia</th>
            </tr>
            @foreach ($voluntariosWeb as $item)
              <tr>
              <td>{{$item->IdVoluntarioWeb}}</td>  
              <td>{{$item->NombreVoluntarioWeb}}</td>    
              <td>{{$item->ApellidoVoluntario1Web}}</td>
              <td>{{$item->ApellidoVoluntario2Web}}</td>
              <td>{{$item->CedulaVoluntarioWeb}}</td>
              <td>{{$item->TelefonoVoluntarioWeb}}</td>
              <td>{{$item->NacionalidadVoluntarioWeb}}</td>
              <td>{{$item->OcupacionWeb}}</td>    
              <td>{{$item->PatologiaWeb}}</td>
              <td><a href="/VoluntarioWeb/{{$item->IdVoluntarioWeb}}/edit" class="btn-accion-tabla tooltipsC" title="Editar inscripcion">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form action="{{route('voluntarioweb_delete', ['VoluntarioWeb' => $item->IdVoluntarioWeb])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar inscripcion">
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