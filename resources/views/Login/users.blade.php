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
          <h3 class="box-title">Usuarios</h3>
        </div>
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>ID Usuario</th>
              <th>email</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>patologia<th>
              <th>Nacionalidad<th>
              <th>Comunidad<th>
            </tr>
            @foreach ($users as $item)
              <tr>
              <td>{{$item->id}}</td>    
              <td>{{$item->email}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->Apellido1}}</td>
              <td>{{$item->Apellido2}}</td>
              <td>{{$item->Cedula}}</td>
              <td>{{$item->patologia}}</td>
              <td>{{$item->Nacionalidad}}</td>
              <td>{{$item->Comunidad}}</td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection