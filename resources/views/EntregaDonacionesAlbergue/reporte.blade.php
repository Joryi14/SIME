<!DOCTYPE html>
<html>
        <head>
        
                <style>
                     @page {
                        margin: 180px 50px;
                    }
                    table {
                        border: none;
                        width: 100%;
                        border-collapse: collapse;
                    }
        
                    td,th { 
                        padding: 2px 1px;
                        text-align: center;
                        border: 1px solid #999;
                        style=color:#456789;
                        font-size:80%;
                    }
        
                    tr:nth-child(1) {
                        background: #dedede;
                    }
                    #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 165px; background-color: orange; text-align: center; }
                    #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 80px; background-color: orange; }
                     #footer .page:after { content: counter(page, upper-roman); }
        
                </style>
        </head>
        
        <body>
        
                <div id = "header">
                    
                    <h4 class="box-title">Comisión Nacional de Prevención de Riesgos Y Atención de Emergencia </h4>
                            <h5 class="box-title"> Comité Comunal de Emergencia de: Nosara</h5>     
                        <h5 class="box-title"> Reporte de entrega de donaciones en albergue</h5>
                        <p>{{$today}}</p>
                        <img style="position: absolute; left: 10px; top: 30px; height: 70px;" src="{{asset("assets/images/logos/1.png")}}" alt="Logo" height="75px;">
                        <img style="position: absolute; right: 78px; top: 30px; height: 70px;"  src="{{asset("assets/images/logos/3.png")}}" alt="Logo" height="75px;">
                </div>
        
                   <div id="footer">
                       <center> <p>{{$today}}</p><center>
                   </div>  
        
        <main>
   <table>
    <tr>
        <th>Id de la entrega</th>
        <th>Cedula del jefe de familia</th>
        <th>Albergue</th>
        <th>Emergencia</th>
        <th>Fecha de creación</th>
      </tr>
 
          @foreach ($EntregaDonacionesAlbergue as $item)
            <tr>
            <td>{{$item->IdEntregaA}}</td>
            <td>{{$item->JefeFamilia->Cedula}}</td>
            <td>Id: {{$item->idAlbergue}} <br> Nombre: {{$item->Albergue->Nombre}}</td>
            <td>Id: {{$item->idEmergencias}}<br> Nombre: {{$item->Emergencia->NombreEmergencias}}</td>
            <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                    </tr>
            @endforeach
    </table>
</main>
</body>
</html>