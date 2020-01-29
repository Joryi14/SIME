@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">    
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }
  .example-modal .modal {
    background: transparent !important;
  }
</style>
@endsection
@section('Script')
<script type="text/javascript">
  $(document).on('click', '.show-modal', function() {
           if($(this).data('du')== 1)
           $('#du').text("Sí tiene");
           else
           $('#du').text("No tiene");
           
           if($(this).data('ino')== 1)
           $('#ino').text("Sí tiene");
           else
           $('#ino').text("No tiene");
           
           if($(this).data('edc')== 1)
           $('#edc').text("Sí tiene");
           else
           $('#edc').text("No tiene");

           if($(this).data('bo')== 1)
           $('#bo').text("Sí tiene");
           else
           $('#bo').text("No tiene");
           
            $('#lon').text($(this).data('lon'));
            $('#lat').text($(this).data('lat'));
         
         });
 </script>
<script type="text/javascript">
  document.querySelector('#form1').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault(); // <--- prevent form from submitting
  Swal.fire({
      title: "Esta seguro de eliminar?",
      text: "Una vez eliminado no se puede recuperar!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
     reverseButtons: true
    }).then((result)=> {
      if (result.value) {
        swalWithBootstrapButtons.fire('Deleted!',
      'Your file has been deleted.',
      'success')}
        else if (
      result.dismiss === Swal.DismissReason.cancel) 
      {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
});
</script>
<script src="{{asset("assets/$theme/bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/$theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script>
$(function () {
    $('#Albergue_Table').DataTable({
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
      },
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
      @include('Includes.mensaje-Error')
    @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header"style="padding:2%">
            <div class="box-tools pull-right">
                <a href="{{route('albergue_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear 
                </a>
            </div>
            
          <h3 class="box-title">Albergue</h3>
        </div>
        
        
        <div class="box-body table-responsive" >
          <table id="Albergue_Table" class="table table-bordered table-striped">
              <thead>
            <tr>
              <th>Id del albergue</th>
              <th>Nombre del albergue</th>
              <th>Distrito</th>
              <th>Comunidad</th>
              <th>Tipo de instalación</th>
              <th>Capacidad del lugar</th>
              <th>Cédula del responsable</th>
              <th>Teléfono</th>
              <th>Nececidades</th>
              <th>Acciones</th>
              </tr>
              </thead>
            @foreach ($albergue as $item)
              <tr>
              <td>{{$item->idAlbergue}}</td>    
              <td>{{$item->Nombre}}</td>
              <td>{{$item->Distrito}}</td>
              <td>{{$item->Comunidad}}</td>
              <td>{{$item->TipoDeInstalacion}}</td>
              <td>{{$item->Capacidad}}</td>
              <td>{{$item->User->Cedula}}</td>
              <td>{{$item->telefono}}</td>
              <td>{{$item->Nececidades}}</td>
              <td><a href="/Albergue/{{$item->idAlbergue}}/edit" class="btn-accion-tabla tooltipsC" title="Editar albergue">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('albergue_delete', ['Albergue' => $item->idAlbergue])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar albergue" onclick="confirmarEnvio()">
                    <i class="fa fa-fw fa-trash text-danger"></i>
                </button>
              </form>
              <button  class="show-modal btn-accion-tabla tooltipsC"title="Mostrar retiro de paquetes" data-toggle="modal" data-target="#Detalle"  data-du="{{$item->Duchas}}" data-ino="{{$item->inodoros}}" data-edc="{{$item->EspaciosDeCocina}}" data-bo="{{$item->Bodega}}" data-lon="{{$item->Longitud}}"data-lat="{{$item->Latitud}}"><i class="fa fa-fw fa-file-text-o text-info"></i></a>
              </td>
              </tr>
            @endforeach
      </table>  
  </div>
</div>
<div class="modal modal-default fade" id="Detalle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b>Información de retiro de paquetes</b></h4>
      </div>  
      <div class="modal-body">
       <div class="form-group ">
        <label class="col-md-4"><b>Duchas:</b></label>
        <div class="col-md-4">
            <span id="du"></span>
        </div>
      </div><br>
     <div class="form-group">
      <label  class="col-md-4"><b>Inodoros:</b></label>
      <div class="col-md-4">
          <span id="ino"></span>
      </div>
  </div><br>
   <div class="form-group">
    <label class="col-md-4"><b>Espacios de cocina:</b></label>
    <div class="col-md-4">
        <span id="edc"></span>
    </div>
  </div>    
      <br><br>
      <div class="form-group">
        <label class="col-md-4"><b>Bodega:</b></label>
        <div class="col-md-4">
            <span id="bo"></span>
        </div>
      </div>    
          <br><br>
          <div class="form-group">
        <label class="col-md-4"><b>Longitud:</b></label>
        <div class="col-md-4">
            <span id="lon"></span>
        </div>
      </div>    
          <br><br>
          <div class="form-group">
        <label class="col-md-4"><b>Latitud:</b></label>
        <div class="col-md-4">
            <span id="lat"></span>
        </div>
      </div>    
          <br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline bg-red pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection