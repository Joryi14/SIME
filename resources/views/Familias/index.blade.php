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
                <a href="{{route('familias_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Familiar
                </a>
            </div>
            
          <h3 class="box-title">Familias</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>ID de familia</th>
              <th>ID Jefe de familia</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>Parentesco</th>
              <th>Edad</th>
              <th>sexo</th>
              <th>PcD</th>
              <th>MG</th>
              <th>PI</th>
              <th>PM</th>
              <th>Patologia</th>
            </tr>
            @foreach ($Familias as $item)
              <tr>
              <td>{{$item->IdFamilia}}</td>      
              <td>{{$item->IdJefeF}}</td>  
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Apellido1}}</td>
              <td>{{$item->Apellido2}}</td>
              <td>{{$item->Cedula}}</td>
              <td>{{$item->Parentesco}}</td>
              <td>{{$item->Edad}}</td>
              <td>{{$item->sexo}}</td>    
              <td>{{$item->PcD}}</td>
              <td>{{$item->MG}}</td>
              <td>{{$item->PI}}</td>
              <td>{{$item->PM}}</td>
              <td>{{$item->Patologia}}</td>
              <td><a href="/Familias/{{$item->IdFamilia}}/edit" class="btn-accion-tabla tooltipsC" title="Editar familia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form action="{{route('familias_delete', ['Familias' => $item->IdFamilia])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar familia">
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