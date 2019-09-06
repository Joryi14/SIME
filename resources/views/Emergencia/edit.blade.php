@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Emergencia/{{$emergencia->idEmergencias}}">
 @method('PUT')
  @csrf
<div class= "form-group">
  <h1>Editar</h1>
  <label>Nombre de la Emergencia: <input type="text" name="NombreEmergencias" class= "form-control" value="{{$emergencia->NombreEmergencias}}"> </label><br>
  <label>Categoria: <input type="text" name="Categoria" class= "form-control" value="{{$emergencia->Categoria}}" > </label><br>
  <label>TipoDeEmergencia: <input type="text" name="TipoDeEmergencia" class= "form-control" value="{{$emergencia->TipoDeEmergencia}}" > </label><br>
  <label>Descripcion: <input type="text" name="Descripcion" class= "form-control" value="{{$emergencia->Descripcion}}" > </label><br>
  <label>Longitud: <input type="text" name="Longitud" class= "form-control" value="{{$emergencia->Longitud}}" > </label><br>
  <label>Latitud: <input type="text" name="Latitud" class= "form-control" value="{{$emergencia->Latitud}}" > </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Editar</button>
   </div>  
@endsection

