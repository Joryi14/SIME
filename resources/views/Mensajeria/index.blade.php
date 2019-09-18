@extends("theme/$theme/layout")
@section('Script')
<script src="{{asset("assets/pages/scripts/admin/index.js")}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script type="text/javascript">
  document.querySelector('#form1').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault(); // <--- prevent form from submitting
  swal({
      title: "Esta seguro de eliminar?",
      text: "Una vez eliminado no se puede recuperar!",
      icon: "info",
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
@endsection
@section('Contenido')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<div class="row" >
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Informes de incidentes</h3>
          <div class="box-tools pull-right">
              <a href="{{route('Mensajeria_create')}}" class="btn btn-block btn-primary btn-sm">
                  <i class="fa fa-fw fa-plus-circle"></i> Crear nuevo informe
                </a>
            </div>
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        @foreach ($mensajerias as $item)
     <div class="panel panel-primary">
            <div class="panel-heading"> Este reporte fue enviado en la fecha y hora: {{$item->created_at}} 
            </div>
                  <div class="panel-body">
                    <p><strong>ID Mensajeria:</strong> {{$item->IdMensajeria}}</p>
                    <p><strong>Codigo Incidente:</strong> {{$item->CodigoIncidente}}</p>
                       <p><strong>Descripcion:</strong>  {{$item->Descripcion}}</p>
                      <p><strong>Ubicacion:</strong>  {{$item->Ubicacion}}</p>
                    <p><strong>Hora:</strong>   {{$item->Hora}}</p>
                       <p><strong>Fecha: </strong>{{\Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}} </p>
                      <p><strong>Categoria:</strong>   {{$item->Categoria}}</p>
                         <p><strong>Id Lider Comunal:</strong>  {{$item->IdLiderComunal}} </p>  
                         <td><a href="/Mensajeria/{{$item->IdMensajeria}}/edit" class="btn-accion-tabla tooltipsC" title="Editar Informe">
                          <i class="fa fa-fw fa-pencil"></i></a>
                          <form action="{{route('mensajeria_delete', ['Mensajeria' => $item->IdMensajeria])}}" id="form1" method="POST">
                              @csrf 
                              <input name="_method" type="hidden" value="DELETE">
                              <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar Informacion" onclick="confirmarEnvio()">
                                  <i class="fa fa-fw fa-trash text-danger"></i>
                              </button>
                          </form>
                         </td>
                          <th><th>  
                   </div>
        </div>                              
        @endforeach    
    </div>
</div>
@endsection