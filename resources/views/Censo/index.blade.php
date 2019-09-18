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
                <a href="{{route('censo_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Censo
                </a>
            </div>
            
          <h3 class="box-title">Censos</h3>
        </div>
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>ID Censo</th>
              <th>Cedula del Jefe de familia</th>
              <th>Refrigerador</th>
              <th>Cocina</th>
              <th>Colchon</th>
              <th>Cama</th>
              <th>Acciones<th>

            </tr>
            @foreach ($censos as $item)
              <tr>
              <td>{{$item->IdCenso}}</td>    
              <td>{{$item->jefeFamilia->Cedula}}</td>
              <td>@if ($item->Refrigerador == 1)
                   Si
              @elseif ($item->Refrigerador == 0) 
                   No
              @endif</td>
              <td>
                  @if ($item->Cocina == 1)
                  Si
             @elseif ($item->Cocina == 0) 
                  No
             @endif
              </td>
              <td>
                  @if ($item->Colchon == 1)
                  Si
             @elseif ($item->Colchon == 0) 
                  No
             @endif</td>
              <td>
                  @if ($item->Cama == 1)
                  Si
             @elseif ($item->Cama == 0) 
                  No
             @endif</td>
              <td><a href="/Censo/{{$item->IdCenso}}/edit" class="btn-accion-tabla tooltipsC" title="Editar censo">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form action="{{route('censo_delete', ['Censo' => $item->IdCenso])}}" class="d-inline form-eliminar" method="POST">
                @csrf @method('delete')
                <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Censo">
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