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
                    <tr>
                    <th>IdInventario</th>
                    <th>idEmergencias</th>
                    <th>Suministros</th>
                    <th>Colchonetas</th>
                    <th>Cobijas</th>
                    <th>Ropa</th>
                  </tr>
                </thead>
                  @foreach ($inventario as $item)
                    <tr>
                    <td>{{$item->idInventario}}</td> 
                    <td>{{$item->idEmergencias}}</td>    
                    <td>{{$item->Suministros}}</td>
                    <td>{{$item->Colchonetas}}</td>
                    <td>{{$item->Cobijas}}</td>
                    <td>{{$item->Ropa}}</td>
       
                    </tr>
            @endforeach
	</table>
</body>
</html>