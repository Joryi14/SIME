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
    $('#Inventario_Table').DataTable({
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
        
      <div class="box box-primary">
        <div class="box-header">
            <div class="box-tools pull-right">
                <a href="{{route('inventario_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear inventario
                </a>
            </div>
            
          <h3 class="box-title">Inventario</h3>
        </div>
        <div class="box-body table-responsive" >
          <table id="Inventario_Table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del inventario</th>
              <th>Id de las emergencias</th>
              <th>Suministros</th>
              <th>Colchonetas</th>
              <th>Cobijas</th>
              <th>Ropa</th>
              <th>Acciones</th>
            </tr>
          </thead>
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
              <form id="form1" action="{{route('inventario_delete', ['Inventario' => $item->idInventario])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Inventario" onclick="confirmarEnvio()">
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