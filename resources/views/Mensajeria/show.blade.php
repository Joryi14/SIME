@extends("theme/$theme/layout")
@section('Contenido')
  @csrf
<div class= "form-group">
  <h1>Crear</h1>
  <label>Id de Mensajeria: {{$mensajeria->IdMensajeria}}</label><br>
  <label>Codigo de Incidente: {{$mensajeria->CodigoIncidente}}</label><br>     
   <label>Descripcion: {{$mensajeria->Descripcion}}</label><br>
   <label>Ubicacion:{{$mensajeria->Ubicacion}} </label><br>
   <label>Hora: {{$mensajeria->Hora}} </label><br>
   <label>Fecha: {{$mensajeria->Fecha}}</label><br>
   <label>Categoria: {{$mensajeria->Categoria}}</label><br>
   <label>Id lider Comunal: {{$mensajeria->IdUsuarioRol}}</label><br>
   </div>

@endsection
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection