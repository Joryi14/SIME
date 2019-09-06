@extends("theme/$theme/layout")
@section('Script')

@endsection
@section('Contenido')
<div class="row">
    <div class="col-xs-8">
        
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('Inventario_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear inventario
                </a>
            </div>
            
          <h3 class="box-title">Inventario</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding" id="tabla-data">
          <table class="table table-hover">
           
            <tr>
              <th>IdInventario</th>
              <th>idEmergencias</th>
              <th>Suministros</th>
              <th>Colchonetas</th>
              <th>Cobijas</th>
              <th>Ropa</th>

            </tr>
            @foreach ($inventarios as $item)
              <tr>
              <td>{{$item->idInventario}}</td> 
              <td>{{$item->idEmergencias}}</td>    
              <td>{{$item->Suministros}}</td>
              <td>{{$item->Colchonetas}}</td>
              <td>{{$item->Cobijas}}</td>
              <td>{{$item->Ropa}}</td>
              
              <td><a href="/Inventario/{{$item->idInventario}}/edit" class="btn-accion-tabla tooltipsC" title="Editar Inventario">
                <i class="fa fa-fw fa-pencil"></i></a>
                <form action="{{route('inventario_delete', ['Inventario' => $item->idInventario])}}" class="d-inline form-eliminar" method="POST">
                  @csrf @method('delete')
                  <button type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Informacion">
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