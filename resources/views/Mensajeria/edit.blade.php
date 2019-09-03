@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Mensajeria/{{$mensajeria->IdMensajeria}}">
 @method('PUT')
  @csrf
<div class= "form-group">
<h1>Editar</h1>
<label>CodigoIncidente: <input type="text" name="CodigoIncidente" value=" {{$mensajeria->CodigoIncidente}}"class= "form-control" > </label><br>
<label>Descripción: <input type="text" name="Descripcion" value=" {{$mensajeria->Descripcion}}" class= "form-control" > </label><br>
<label>Ubicación: <input type="text" name="Ubicacion" value=" {{$mensajeria->Ubicacion}}" class= "form-control" > </label><br>
<label>Hora: <input type="text" name="Hora" value=" {{$mensajeria->Hora}}" class= "form-control" > </label><br>
<label>Fecha: <input type="text" name="Fecha" value=" {{$mensajeria->Fecha}} " class= "form-control" > </label><br>
<label>Categoria: <input type="text" name="Categoria" value=" {{$mensajeria->Categoria}}" class= "form-control" > </label><br>
<label>Id lider Comunal: <input type="text" name="IdLiderComunal"  value=" {{$mensajeria->IdLiderComunal}}" class= "form-control" > </label><br>
</div>


      

   <button type="submit" class="btn btn-primary">Editar</button>
   </div>  
@endsection