@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Censo</h3>
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
              <th>ID Censo</th>
              <th>ID Jefe de familia</th>
              <th>Refrigerador</th>
              <th>Cocina</th>
              <th>Colchon</th>
              <th>Cama</th>
            </tr>
            @foreach ($censos as $item)
<tr>
<td>{{$item->IdCenso}}</td>    
<td>{{$item->IdJefeFam}}</td>
<td>{{$item->Refrigerador}}</td>
<td>{{$item->Cocina}}</td>
<td>{{$item->Colchon}}</td>
<td>{{$item->Cama}}</td>
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