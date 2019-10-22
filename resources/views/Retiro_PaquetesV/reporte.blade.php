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
            }

            tr:nth-child(1) {
                background: #dedede;
            }
            #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; }
            #footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 150px; background-color: orange; }
             #footer .page:after { content: counter(page, upper-roman); }

        </style>
</head>

<body>

        <div id = "header">
            
            <h2 class="box-title">Comición Nacional de Prevención de Riesgos Y Atención de Emergencia </h2>
                    <h3 class="box-title"> Comité Comunal de Emergencia de: Nosara</h3>     
                <h4 class="box-title"> Reporte de retiro de paquetes</h4>
                <img style="position: absolute; left: 10px; top: 30px; height: 90px;" src="{{asset("assets/images/1.png")}}" alt="Logo" height="75px;">
                <img style="position: absolute; right: 100px; top: 30px; height: 90px;"  src="{{asset("assets/images/3.png")}}" alt="Logo" height="75px;">
        </div>

           <div id="footer">
               <center> <p>{{$today}}</p><center>
           </div>  

<main>

    <table>
         
    
            <tr >
                <th>Id de RetiroPaquetes</th>
                <th>Id de AdministradorI</th>
                <th>Nombre del chofer</th>
                <th>Primer apellido del chofer</th>
                <th>Segundo apellido del chofer</th>
                <th>Id de Voluntario</th>
                <th>Placa de Vehiculo</th>
                <th>Direccion A Entregar</th>
                <th>Suministros Gobierno </th>
                <th>Suministros Comision</th>
                <th>Id de Inventario</th>
             
            </tr>
      

            @foreach ($Retiro as $item)
              <tr>
                <td>{{$item->IdRetiroPaquetes}}</td>      
                <td>{{$item->IdAdministradorI}}</td>
                <td>{{$item->NombreChofer}}</td>  
                <td>{{$item->Apellido1C}}</td>  
                <td>{{$item->Apellido2C}}</td>  
                <td>{{$item->IdVoluntario}}</td>
                <td>{{$item->PlacaVehiculo}}</td>
                <td>{{$item->DireccionAEntregar}}</td>
                <td>{{$item->SuministrosGobierno}}</td>
                <td>{{$item->SuministrosComision}}</td>
                <td>{{$item->IdInventario}}</td>     
              </tr>
            @endforeach
    </table>
           </main>
</body>
</html>