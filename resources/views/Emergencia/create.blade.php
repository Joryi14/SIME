@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Emergencia/store">
  @csrf
<div class= "form-group">
  <h1>Crear</h1>
  <label>Nombre de la Emergencia: <input type="text" name="NombreEmergencias" class= "form-control" > </label><br>
  <label>Categoria: <input type="text" name="Categoria" class= "form-control" > </label><br>
  <label>TipoDeEmergencia: <input type="text" name="TipoDeEmergencia" class= "form-control" > </label><br>
  <label>Descripcion: <input type="text" name="Descripcion" class= "form-control" > </label><br>
  <label>Longitud: <input type="text" name="Longitud" class= "form-control" > </label><br>
  <label>Latitud: <input type="text" name="Latitud" class= "form-control" > </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>  
@endsection
