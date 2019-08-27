@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Emergencias</h3>
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
              <th>idEmergencias</th>
              <th>NombreEmergencias</th>
              <th>Categoria</th>
              <th>TipoDeEmergencia</th>
              <th>Descripcion</th>
              <th>Longitud</th>
              <th>Latitud</th>
            </tr>
            @foreach ($emergencias as $item)
<tr>
<td>{{$item->idEmergencias}}</td>    
<td>{{$item->NombreEmergencias}}</td>
<td>{{$item->Categoria}}</td>
<td>{{$item->TipoDeEmergencia}}</td>
<td>{{$item->Descripcion}}</td>
<td>{{$item->Longitud}}</td>
<td>{{$item->Latitud}}</td>
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