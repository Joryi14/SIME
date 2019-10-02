<!DOCTYPE html>
<html>
    <head>
    </head>
        <style>
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
        </style>
<body>

	<table>
         
    
            <tr >
              <th>Id de RetiroPaquetes</th>
              <th>Id de Chofer</th>
              <th>Id de AdministradorI</th>
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
              <td>{{$item->IdChofer}}</td>  
              <td>{{$item->IdAdministradorI}}</td>
              <td>{{$item->IdVoluntario}}</td>
              <td>{{$item->PlacaVehiculo}}</td>
              <td>{{$item->DireccionAEntregar}}</td>
              <td>{{$item->SuministrosGobierno}}</td>
              <td>{{$item->SuministrosComision}}</td>
              <td>{{$item->IdInventario}}</td>    
              </tr>
            @endforeach
	</table>
</body>
</html>