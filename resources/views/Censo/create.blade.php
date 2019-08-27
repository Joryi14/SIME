@extends("theme/$theme/layout")
@section('Contenido')
<form class= "form-group" method="POST" action="/Censo/store">
  @csrf
<div class= "form-group">
  <h1>Crear</h1>
  <label>Id de jefe de familia: <input type="text" name="IdJefeFam" class= "form-control" > </label><br>
          <input type="hidden" name="Refrigerador" value="0" />
   <label><input type="checkbox" name="Refrigerador" value="1"> Refrigerador </label><br>
          <input type="hidden" name="Cocina" value="0" />
   <label><input type="checkbox" name="Cocina" value="1"> Cocina </label><br>
          <input type="hidden" name="Colchon" value="0" />
   <label><input type="checkbox" name="Colchon" value="1"> Colchon </label><br>
          <input type="hidden" name="Cama" value="0" />
   <label><input type="checkbox" name="Cama" value="1"> Cama </label><br>
   </div>

   <button type="submit" class="btn btn-primary">Guardar</button>
   </div>  
@endsection
