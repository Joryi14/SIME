@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Familias/{{$Familia->IdFamilia}}">
 @method('PUT')
  @csrf
<div class= "form-group">
  <h1>Editar</h1>
  <label>Id jefe de familia: <input type="text" name="TotalPersonas" class= "form-control" value="{{$Familia->IdJefeF}}"> </label><br>
  <label>Nombre: <input type="text" name="Nombre" class= "form-control" value="{{$Familia->Nombre}}" readonly="readonly"> </label><br>
  <label>Apellido1: <input type="text" name="Apellido1" class= "form-control" value="{{$Familia->Apellido1}}" readonly="readonly"> </label><br>
  <label>Apellido2: <input type="text" name="Apellido2" class= "form-control" value= "{{$Familia->Apellido2}}"  readonly="readonly"> </label><br>
  <label>Cedula: <input type="text" name="Cedula" class= "form-control" value="{{$Familia->Cedula}}" > </label><br>
  <label>Parentesco: <input type="text" name="Parentesco" class= "form-control" value="{{$Familia->Parentesco}}"> </label><br>
  <label>Edad: <input type="text" name="Edad" class= "form-control" value="{{$Familia->Edad}}" > </label><br>
  <label>sexo: <input type="text" name="sexo" class= "form-control" value="{{$Familia->sexo}}" > </label><br>
  <input type="hidden" name="PcD" value="no" />
  <label>PcD: <input type="checkbox" name="PcD" value="si"> </label><br>
  <input type="hidden" name="MG" value="no" />
  <label>MG: <input type="checkbox" name="MG" value="si"> </label><br>
  <input type="hidden" name="PI" value="no" />
  <label>PI: <input type="checkbox" name="PI" value="si"> </label><br>
  <input type="hidden" name="PM" value="no" />
  <label>PM: <input type="checkbox" name="PM" value="si"> </label><br>
  <label>Patologia: <input type="text" name="Patologia" class= "form-control" value="{{$Familia->Patologia}}"> </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Editar</button>
   </div>  
@endsection