@if (session("nota"))
<div class="alert alert-danger alert-dismissible" data-auto-dismiss ="7000">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="glyphicon glyphicon-arrow-down"></i> ¡Atencion!</h4>
    <ul>
            <li>{{session("nota")}}</li>
    </ul>
    </div>
@endif