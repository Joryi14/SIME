@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Inventario/{{$inventario->idInventario}}">
 @method('PUT')
  @csrf
<div class= "form-group">
<h1>Agregar suministros</h1>


<div class="form-group ">
  <label>IdEmergencias: <input type="text" name="idEmergencias" 
    class= "form-control" value=" {{$inventario->idEmergencias}}"readonly="readonly"> </label><br>

  <label>Suministros: <input type="text" name="Suministros" 
    class= "form-control" value=" {{$inventario->Suministros}}" readonly="readonly"> </label><br>
    <label>Suministros: <input type="text" name="Suministros" 
    class= "form-control" value="{{$inventario->suma}}" readonly="readonly"> </label><br>
     
   </div>  
@endsection