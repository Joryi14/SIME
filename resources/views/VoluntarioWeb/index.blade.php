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
    $('#VoluntariosWeb_table').DataTable({
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
               
            </div>
            
          <h3 class="box-title">Incripciones web de voluntarios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" >
            <table id="VoluntariosWeb_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Id</th>
              <th>Nombre</th>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Cédula</th>
              <th>Teléfono</th>
              <th>Nacionalidad</th>
              <th>Ocupación</th>
              <th>Patología</th>
              <th>Acciones</th>
            </tr>
              </thead>
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
              <td><a href="/VoluntarioWeb/{{$item->IdVoluntarioWeb}}/edit" class="btn-accion-tabla tooltipsC" title="Editar VoluntarioWeb">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('voluntarioweb_delete', ['VoluntarioWeb' => $item->IdVoluntarioWeb])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar VoluntarioWeb" onclick="confirmarEnvio()">
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