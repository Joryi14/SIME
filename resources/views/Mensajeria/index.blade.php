@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Informes de incidentes</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
       
          
        
     @foreach ($mensajerias as $item)
     <div class="panel panel-default">
            <div class="panel-heading">
  
             <div class="panel-heading"></div>
                   <div class="panel-body">
                    <p><strong>ID Mensajeria:</strong> {{$item->IdMensajeria}}</p>
                    <p><strong>Codigo Incidente:</strong> {{$item->CodigoIncidente}}</p>
                       <p><strong>Descripcion:</strong>  {{$item->Descripcion}}</p>
                      <p><strong>Ubicacion:</strong>  {{$item->Ubicacion}}</p>
                    <p><strong>Hora:</strong>   {{$item->Hora}}</p>
                       <p><strong>Fecha:</strong>        {{$item->Fecha}}</p>
                      <p><strong>Categoria:</strong>   {{$item->Categoria}}</p>
                         <p><strong>Id Lider Comunal:</strong>  {{$item->IdUsuarioRol}} </p>  
                             <th><th> 
                             </div>
            </div>
                    </div>
                    <!-- /.box-body -->
             </div>                               <a href="/Mensajeria/{{$item->IdMensajeria}}" class= "btn btn=primary">D</a>
            @endforeach
          
      <!-- /.box -->
    </div>
  </div>
</div>
</div>
@endsection