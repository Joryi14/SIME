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
    $('#Noticia_table').DataTable({
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
        @include('Includes.mensaje-Succes')
      <div class="box box-primary">
        <div class="box-header"  style="padding:2%">
            <div class="box-tools pull-right">
                <a href="{{route('noticia_create')}}" class="btn btn-block btn-primary btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i> Crear
                </a>
            </div>
            
          <h3 class="box-title">Noticia</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" >
            <table id="Noticia_table" class="table table-bordered table-striped">
              <thead>
           
            <tr>
                <th>Id de las noticias</th>
                <!--<th>Fecha de publicación</th>-->
                <th>Titulo</th>
                <th>Id del autor</th>
                <th>Imagenes</th>
                <th>Videos</th>
                <th>Artículo</th>    
                <th>PDF</th>
                <th>Acciones</th>
            </tr>
          </thead>
            @foreach ($noticias as $item)
              <tr>
              <td>{{$item->IdNoticias}}</td>  
                
              <td>{{$item->Titulo}}</td>
              <td>{{$item->IdAutor}}</td>
              <td>
              @if($item->Imagenes != null)
              <img style='display:block; width:100px;height:100px;' src='img/{{$item->Imagenes}}'>
              @endif
            </td>
              <td>
                  @if($item->Videos != null)
                <video width="200" height="120"  controls>
                  <source src='Video/{{$item->Videos}}' type="video/mp4">
                  </video>
              @endif
              </td>
              <td>
                <p>{{$item->Articulo}}<p></td>  
              <td>
              @if($item->PDF != null)   
                {{$item->PDF}}
              @endif
              </td>
              <td><a href="/Noticia/{{$item->IdNoticias}}/edit" class="btn-accion-tabla tooltipsC" title="Editar noticia">
                <i class="fa fa-fw fa-pencil"></i></a>
              <form id="form1" action="{{route('noticia_delete', ['Noticia' => $item->IdNoticias])}}" method="POST">
                @csrf 
                <input name="_method" type="hidden" value="DELETE">
                <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar noticia" onclick="confirmarEnvio()">
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