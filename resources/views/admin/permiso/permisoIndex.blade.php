@extends("theme/$theme/layout")
@section('Contenido')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Permisos</h3>
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
              <th>ID Permiso</th>
              <th>Nombre</th>
              <th>Slug</th>
            </tr>
            @foreach ($permisos as $item)
<tr>
<td>{{$item->IdPermiso}}</td>    
<td>{{$item->NombrePermiso}}</td>
<td>{{$item->Slug}}</td>
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