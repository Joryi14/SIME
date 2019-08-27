@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Familia</h3>
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
              <th>ID de familia</th>
              <th>ID Jefe de familia</th>
              <th>Nombre</th>
              <th>Apellido1</th>
              <th>Apellido2</th>
              <th>Cedula</th>
              <th>Parentesco</th>
              <th>Edad</th>
              <th>sexo</th>
              <th>PcD</th>
              <th>MG</th>
              <th>PI</th>
              <th>PM</th>
              <th>Patologia</th>
            </tr>
            @foreach ($Familias as $item)
<tr>
<td>{{$item->IdFamilia}}</td>      
<td>{{$item->IdJefeF}}</td>  
<td>{{$item->Nombre}}</td>
<td>{{$item->Apellido1}}</td>
<td>{{$item->Apellido2}}</td>
<td>{{$item->Cedula}}</td>
<td>{{$item->Parentesco}}</td>
<td>{{$item->Edad}}</td>
<td>{{$item->sexo}}</td>    
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