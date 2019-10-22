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
            
                <h1 class="box-title">Retiro de Paquetes </h1> 
                <img src="data:image/jpeg;base64,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" alt="Logo" width="50px;">
               
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