@extends('layouts.app')

@section('title','Crear Jede de familia')
    
@section('content')
<form class= "form-group" method="POST" action="/JefeDeFamilia">
  @csrf
<div class= "form-group">
  <h1>Crear</h1>
  <label>TotalPersonas: <input type="text" name="TotalPersonas" class= "form-control" > </label><br>
  <label>Nombre: <input type="text" name="Nombre" class= "form-control" > </label><br>
  <label>Apellido1: <input type="text" name="Apellido1" class= "form-control" > </label><br>
  <label>Apellido2: <input type="text" name="Apellido2" class= "form-control" > </label><br>
  <label>Cedula: <input type="text" name="Cedula" class= "form-control" > </label><br>
  <label>Edad: <input type="text" name="Edad" class= "form-control" > </label><br>
  <label>sexo: <input type="text" name="sexo" class= "form-control" > </label><br>
  <label>Telefono: <input type="text" name="Telefono" class= "form-control" > </label><br>
  <label>PcD: <input type="text" name="PcD" class= "form-control" > </label><br>
  <label>MG: <input type="text" name="MG" class= "form-control" > </label><br>
  <label>PI: <input type="text" name="PI" class= "form-control" > </label><br>
  <label>PM: <input type="text" name="PM" class= "form-control" > </label><br>
  <label>Patologia: <input type="text" name="Patologia" class= "form-control" > </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>  
@endsection
