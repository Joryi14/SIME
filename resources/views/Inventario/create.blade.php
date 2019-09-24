@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Inventario/store">
  @csrf
<form>
<div class= "form-group">
  <h1>Crear Inventario</h1>
  <div class="form-group ">
  <label>idEmergencias: <input type="text" name="idEmergencias" class= "form-control" > </label><br>
  <label>Suministros: <input type="text" name="Suministros" class= "form-control" > </label><br>

  <input type="hidden" name="Colchonetas" value="0" />
  <label><input type="checkbox" name="Colchonetas" value="1"> Colchonetas</label><br>

  <input type="hidden" name="Cobijas" value="0" />
  <label><input type="checkbox" name="Cobijas" value="1"> Cobijas</label><br>

  <input type="hidden" name="Ropa" value="0" />
  <label><input type="checkbox" name="Ropa" value="1"> Ropa</label><br>
   </div>
  
   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>
    
@endsection