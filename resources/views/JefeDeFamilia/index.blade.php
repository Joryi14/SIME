@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-8">
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('jefe_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Jefe de familia
                </a>
            </div>
            
          <h3 class="box-title">Jefes de familia</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>ID Jefe de familia</th>
              <th>TotalPersonas</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>Edad</th>
              <th>sexo</th>
              <th>Telefono</th>
              <th>PcD</th>
              <th>MG</th>
              <th>PI</th>
              <th>PM</th>
              <th>Patologia</th>
            </tr>
            @foreach ($JefeF as $item)
              <tr>
              <td>{{$item->IdJefe}}</td>  
              <td>{{$item->TotalPersonas}}</td>    
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Apellido1}}</td>
              <td>{{$item->Apellido2}}</td>
              <td>{{$item->Cedula}}</td>
              <td>{{$item->Edad}}</td>
              <td>{{$item->sexo}}</td>    
              <td>{{$item->Telefono}}</td>
              <td>{{$item->PcD}}</td>
              <td>{{$item->MG}}</td>
              <td>{{$item->PI}}</td>
              <td>{{$item->PM}}</td>
              <td>{{$item->Patologia}}</td>
              <td><a href="/JefeDeFamilia/{{$item->IdJefe}}/edit" class="btn-accion-tabla tooltipsC" title="Editar jefe de familia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form action="{{route('jefe_delete', ['JefeDeFamilia' => $item->IdJefe])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar jefe de familia">
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