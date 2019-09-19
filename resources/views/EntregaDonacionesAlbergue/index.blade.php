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
    $('#EntregaDonacionesAlbergue_table').DataTable({
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
                <a href="{{route('EntregaDonacionesA_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Entrega
                </a>
            </div>
          <h3 class="box-title">Entrega de donaciones en albergue</h3>
        </div>
         <div class="box-body" >
          <table id="EntregaDonacionesAlbergue_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id Entrega</th>
              <th>Id Jefe de familia</th>
              
            </tr>
          </thead>
                @foreach ($entregadonacionesAlbergue as $item)
                  <tr>
                  <td>{{$item->IdEntregaA}}</td>

                  <td>{{$item->IdJefeFa->cedula}}</td>
                 
                  <td><a href="/EntregaDonacionesAlbergue/{{$item->IdEntregaA}}/edit" class="btn-accion-tabla tooltipsC" title="Editar EntregaDonacionesAlbergue">
                    <i class="fa fa-fw fa-pencil"></i></a>
                  <form id="form1" action="{{route('EntregaDonacionesA_delete', ['EntregaDonacionesAlbergue' => $item->IdEntregaA])}}" method="POST">
                    @csrf 
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar EntregaDonacionesAlbergue" onclick="confirmarEnvio()">
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