@extends("theme.$theme.layout")
@section("styles")
<link href="{{asset("assets/js/jquery-nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endsection

@section("scriptsPlugins")
<script src="{{asset("assets/js/jquery-nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endsection

@section("Script")
<script src="{{asset("assets/pages/scripts/admin/menu/index.js")}}" type="text/javascript"></script>
@endsection

@section('Contenido')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Menús</h3>
            </div>
            <div class="box-body">
                @csrf
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($menus as $key => $item)
                            @if ($item["idMenu"] != 0)
                                @break
                            @endif
                            @include("admin.menu.menu-item",["item" => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection