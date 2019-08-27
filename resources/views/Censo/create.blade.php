@extends('layouts.app')

@section('title','Crear Censo')
    
@section('content')
<form class= "form-group" method="POST" action="/Censo">
  @csrf
<div class= "form-group">
  <h1>Crear</h1>
  <label>Id de jefe de familia: <input type="text" name="IdJefeFam" class= "form-control" > </label><br>
   <label><input type="checkbox" name="Refrigerador" value="1"> Refrigerador </label><br>
   <label><input type="checkbox" name="Cocina" value="1"> Cocina </label><br>
   <label><input type="checkbox" name="Colchon" value="1"> Colchon </label><br>
   <label><input type="checkbox" name="Cama" value="1"> Cama </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>  
@endsection
