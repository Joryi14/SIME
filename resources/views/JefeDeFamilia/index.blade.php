@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Jefe de familia</h3>
          <div class="box-tools">
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>
              <th>ID Jefe de familia</th>
              <th>TotalPersonas</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>Edad</th>
              <th>sexo</th>
              <th>Telefono</th>
              <th>PcD</th>
              <th>MG</th>
              <th>PI</th>
              <th>PM</th>
              <th>Patologia</th>
            </tr>
            @foreach ($JefeF as $item)
<tr>
<td>{{$item->IdJefe}}</td>  
<td>{{$item->TotalPersonas}}</td>    
<td>{{$item->Nombre}}</td>
<td>{{$item->Apellido1}}</td>
<td>{{$item->Apellido2}}</td>
<td>{{$item->Cedula}}</td>
<td>{{$item->Edad}}</td>
<td>{{$item->sexo}}</td>    
<td>{{$item->Telefono}}</td>
<td>{{$item->PcD}}</td>
<td>{{$item->MG}}</td>
<td>{{$item->PI}}</td>
<td>{{$item->PM}}</td>
<td>{{$item->Patologia}}</td>
</tr>

            @endforeach
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
@endsection