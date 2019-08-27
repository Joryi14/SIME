@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/JefeDeFamilia/store">
  @csrf
<div class= "form-group">
  <h1>Crear Jefe de familia</h1>
  <label>TotalPersonas: <input type="text" name="TotalPersonas" class= "form-control" > </label><br>
  <label>Nombre: <input type="text" name="Nombre" class= "form-control" > </label><br>
  <label>Apellido1: <input type="text" name="Apellido1" class= "form-control" > </label><br>
  <label>Apellido2: <input type="text" name="Apellido2" class= "form-control" > </label><br>
  <label>Cedula: <input type="text" name="Cedula" class= "form-control" > </label><br>
  <label>Edad: <input type="text" name="Edad" class= "form-control" > </label><br>
  <label>sexo: <input type="text" name="sexo" class= "form-control" > </label><br>
  <label>Telefono: <input type="text" name="Telefono" class= "form-control" > </label><br>
  <input type="hidden" name="PcD" value="no" />
  <label>PcD: <input type="checkbox" name="PcD" value="si"> </label><br>
  <input type="hidden" name="MG" value="no" />
  <label>MG: <input type="checkbox" name="MG" value="si"> </label><br>
  <input type="hidden" name="PI" value="no" />
  <label>PI: <input type="checkbox" name="PI" value="si"> </label><br>
  <input type="hidden" name="PM" value="no" />
  <label>PM: <input type="checkbox" name="PM" value="si"> </label><br>
  <label>Patologia: <input type="text" name="Patologia" class= "form-control" > </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>  
@endsection
