@extends("theme/$theme/layout")
@section('Script')
@endsection
@section('Contenido')
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="content-row-title">Informes de incidentes
            <a href="{{route('Mensajeria_create')}}" class="btn btn-success btn-lg pull-right">
              <i class="fa fa-plus-circle"></i> Crear
          </a></h4>
          <br>
          <div class="row">
            
          <form action="/search" method="GET">
            <div class="col-md-2">
            <input type="search" name="buscar" class="form-control"> 
          </div> 
          <div class="col-md-2">  
            <button type="submit" class="btn btn-warning">buscar</button>
          </div>
          </form>
        </div>
        </div>
        </div>
  @foreach ($mensajerias as $item)
     <div class="panel panel-info">
            <div class="panel-heading"> Este reporte fue enviado en la fecha y hora: {{$item->created_at}}
            </div>
                  <div class="panel-body">
                    <p><strong>Id Mensajería:</strong> {{$item->IdMensajeria}}</p>
                    <p><strong>Código de incidente:</strong> {{$item->CodigoIncidente}}</p>
                       <p><strong>Descripción:</strong>  {{$item->Descripcion}}</p>
                    <p><strong>Hora:</strong> <input type="time" value="{{$item->Hora}}" readonly style="border:0px"> </p>
                       <p><strong>Fecha: </strong>{{\Carbon\Carbon::parse($item->fecha)->format('d/m/Y')}} </p>
                      <p><strong>Categoría:</strong>   {{$item->Categoria}}</p>
                         <p><strong>Líder comunal:</strong>  {{$item->LiderComunal->Cedula}}  {{$item->LiderComunal->name}}  {{$item->LiderComunal->Apellido1}}</p>
                         <td><a href="/Mensajeria/{{$item->IdMensajeria}}/edit" class="btn-accion-tabla tooltipsC" title="Editar informe">
                          <i class="fa fa-fw fa-pencil text-success"></i></a>
                          <form action="{{route('mensajeria_delete', ['Mensajeria' => $item->IdMensajeria])}}" id="form1" method="POST">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button id="btneliminar" type="submit" class="btn-accion-tabla tooltipsC" title="Eliminar informe" onclick="confirmarEnvio()">
                                  <i class="fa fa-fw fa-trash text-danger"></i>
                              </button>
                          </form>
                         </td>
                          <th><th>
<div class="tabbable tabs-left clearfix">
  <ul id="myTab1" class="nav nav-tabs">
  <li class="active"><a href="#home3" data-toggle="tab">Home</a></li>
  <li class=""><a href="#profile3" data-toggle="tab">Profile</a></li>
  <li class=""><a href="#myTabDrop3" data-toggle="tab">Dropdown</a></li>
  </ul>
  <div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="home3">
  <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p>
  </div>
  <div class="tab-pane fade" id="profile3">
  <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee.</p>
  </div>
  <div class="tab-pane fade" id="myTabDrop3">
  <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone...</p>
  </div>
  </div>
  </div>
  
                   </div>
        </div>
        @endforeach
@endsection
