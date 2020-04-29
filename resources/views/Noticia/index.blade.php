@extends("theme/$theme/layout")
@section('styles')
<link rel="stylesheet" href="{{asset("assets/$theme/bootflat-admin/datatables.min.css")}}">    
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
<script src="{{asset("assets/$theme/bootflat-admin/datatables.min.js")}}"></script>
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
        "search": "Buscar: ",
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
@include('Includes.mensaje-Succes')
<div class="panel panel-success">
  <div class="panel-heading">
    <h4 class="content-row-title">Noticia
      <a href="{{route('noticia_create')}}" class="btn  btn-primary btn-lg pull-right">
          <i class="fa fa-fw fa-plus-circle"></i> Crear
      </a>
  </h4>
  <br>
  </div>
<div class="panel-body">
  <div class="content-row">
            
            <table id="Noticia_table" class="table table-bordered">
            <thead>
            <tr>
                <th>Id de las noticias</th>
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
                <i class="fa fa-fw fa-pencil text-success"></i></a>
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
@endsection