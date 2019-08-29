@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Mensajeria/store">
  @csrf
<div class= "form-group">
  <h1>Crear Reporte de incidente</h1>
  <label>CodigoIncidente: <input type="text" name="CodigoIncidente" class= "form-control" > </label><br>
  <label>Descripción: <input type="text" name="Descripcion" class= "form-control" > </label><br>
  <label>Ubicación: <input type="text" name="Ubicacion" class= "form-control" > </label><br>
  <label>Hora: <input type="text" name="Hora" class= "form-control" > </label><br>
  <label>Fecha: <input type="text" name="Fecha" class= "form-control" > </label><br>
  <label>Categoria: <input type="text" name="Categoria" class= "form-control" > </label><br>
  <label>Id de Lider Comunal: <input type="text" name="IdUsuarioRol" class= "form-control" > </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>  
@endsection