@extends("theme/$theme/layout")
@section('Contenido')
  @csrf
<div class= "form-group">
  <h1>Crear</h1>
  <label>Id de Censo: {{$censo->IdCenso}}</label><br>
  <label>Id de jefe de familia: {{$censo->IdJefeFam}}</label><br>     
   <label>Refrigerador: {{$censo->Refrigerador}}</label><br>
   <label>Cocina:{{$censo->Cocina}} </label><br>
   <label>Colchon: {{$censo->Colchon}} </label><br>
   <label>Cama: {{$censo->Cama}}</label><br>
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