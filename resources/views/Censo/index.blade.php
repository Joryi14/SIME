@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
<script type="text/javascript">
  document.querySelector('#form1').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault(); // <--- prevent form from submitting
  swal({
      title: "Esta seguro de eliminar?",
      text: "Una vez eliminado no se puede recuperar!",
      icon: "warning",
      buttons: [
        'Cancelar!',
        'Aceptar!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        swal({
          title: 'Exito!',
          text: 'Se ha Eliminado el registro!',
          icon: 'success'
        }).then(function() {
          form.submit(); // <--- submit form programmatically
        });
      } else {
        swal("Cancelado","" ,"error");
      }
    })
});
</script>
<script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script>
$(function () {
    $('#Censo_table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
@section('Contenido')
<div class="row">
  <div class="col-xs-12">
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
         <div class="box-body" >
          <table id="Censo_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID Censo</th>
              <th>Cedula del Jefe de familia</th>
              <th>Refrigerador</th>
              <th>Cocina</th>
              <th>Colchon</th>
              <th>Cama</th>
              <th>Acciones</th>
            </tr>
          </thead>
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
                  <form id="form1" action="{{route('censo_delete', ['Censo' => $item->IdCenso])}}" method="POST">
                    @csrf 
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Censo" onclick="confirmarEnvio()">
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