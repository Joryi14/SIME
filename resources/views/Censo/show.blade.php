@extends("theme/$theme/layout")
@section('Contenido')
  @csrf
<div class= "form-group">
  <h1>Censo</h1>
  <label>Id de Censo: {{$censo->IdCenso}}</label><br>
  <label>Id de jefe de familia: {{$censo->IdJefeFam}}</label><br>     
   <label>Refrigerador: {{$censo->Refrigerador}}</label><br>
   <label>Cocina:{{$censo->Cocina}} </label><br>
   <label>Colchon: {{$censo->Colchon}} </label><br>
   <label>Cama: {{$censo->Cama}}</label><br>
   </div>

   {!! Form::open(['route'=>['Censo.destroy',$item->IdCenso], 'method'=> 'DELETE']) !!}
{!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}
{!! Form::close()!!}
@endsection