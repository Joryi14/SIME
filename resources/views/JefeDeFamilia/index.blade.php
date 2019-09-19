@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
@endsection
@section('Script')
<script type="text/javascript">
  document.querySelector('#form2').addEventListener('submit', function(e) {
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
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script>
$(function () {
    $('#Jefe_table').DataTable({
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
                <a href="{{route('jefe_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear Jefe de familia
                </a>
            </div>
            
          <h3 class="box-title">Jefes de familia</h3>
        </div>
        <div class="box-body table-responsive">
          <table id="Jefe_table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID Jefe de familia</th>
              <th>Total
                Personas</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>Edad</th>
              <th>Sexo</th>
              <th>Telefono</th>
              <th>Persona
                 Con 
                 Discapacidad</th>
              <th>Mujer Gestante</th>
              <th>Persona Indigena</th>
              <th>Persona Migrante</th>
              <th>Patologia</th>
              <th>Acciones</th>
            </tr>
            </thead>
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
                <form id="form2" action="{{route('jefe_delete', ['JefeDeFamilia' => $item->IdJefe])}}" method="POST">
                    @csrf 
                    <input name="_method" type="hidden" value="DELETE">
                    <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Jefe" onclick="confirmarEnvio()">
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