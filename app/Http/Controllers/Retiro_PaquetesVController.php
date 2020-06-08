<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionRetiroPaquetes;
use App\Models\Emergencia;
use App\Models\EntregaDonaciones;
use App\Models\Inventario;
use Illuminate\Support\Facades\DB;
use App\Models\Retiro_PaquetesV;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Retiro_PaquetesVController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $retiroPV = new Retiro_PaquetesV();
        $retiroPV = DB::table('retiropaquetes')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('users','retiropaquetes.IdVoluntario','=','users.id')->join('users as c','retiropaquetes.IdAdministradorI','=','c.id')
        ->join('inventario','retiropaquetes.IdInventario','=','inventario.idInventario')
        ->select('retiropaquetes.IdRetiroPaquetes','c.id','c.name','c.Apellido1','c.Cedula',
        'retiropaquetes.NombreChofer','retiropaquetes.Apellido1C','retiropaquetes.Apellido2C',
        'users.Cedula as Ced','users.id as idV','users.name as vol','users.Apellido1 as av','emergencia.idEmergencias',
        'emergencia.NombreEmergencias',
        'retiropaquetes.PlacaVehiculo',
        'retiropaquetes.DireccionAEntregar',
        'retiropaquetes.SuministrosGobierno',
        'retiropaquetes.SuministrosComision',
        'retiropaquetes.created_at','inventario.idInventario')->orderBy('IdRetiroPaquetes')->get();

        return view('Retiro_PaquetesV.index', compact('retiroPV'));
    }
    public function index2()
    {
        $retiro = new Retiro_PaquetesV();
        $retiro = DB::table('retiropaquetes')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('users','retiropaquetes.IdVoluntario','=','users.id')->join('users as c','retiropaquetes.IdAdministradorI','=','c.id')
        ->join('inventario','retiropaquetes.IdInventario','=','inventario.idInventario')->where('emergencia.Estado','Activa')
        ->select('retiropaquetes.IdRetiroPaquetes','c.id','c.name','c.Apellido1','c.Cedula',
        'retiropaquetes.NombreChofer','retiropaquetes.Apellido1C','retiropaquetes.Apellido2C',
        'users.Cedula as Ced','users.id as idV','users.name as vol','users.Apellido1 as av','emergencia.idEmergencias',
        'emergencia.NombreEmergencias',
        'retiropaquetes.PlacaVehiculo',
        'retiropaquetes.DireccionAEntregar',
        'retiropaquetes.SuministrosGobierno',
        'retiropaquetes.SuministrosComision',
        'retiropaquetes.created_at','inventario.idInventario')->orderBy('IdRetiroPaquetes')->get();
        //dd($retiro);
        return view('Retiro_PaquetesV.indexFiltrado', compact('retiro'));
    }
    public function getEmergeR(Request $request){

        $search = $request->search;
        if($search == ''){
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias','Estado')->where('Estado','Activa')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias','Estado')->where('NombreEmergencias', 'like', '%' .$search . '%')->where('Estado','Activa')->orWhere('NombreEmergencias', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($Emergencia as $Emer){
           $response[] = array(
                "id"=>$Emer->idEmergencias,
                "NombreEmergencias"=>$Emer->NombreEmergencias
           );
        }
        echo json_encode($response);
        exit;
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Retiro_PaquetesV.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionRetiroPaquetes $request)
    {
        $inv = inventario::find($request->IdInventario);
        $vol = User::find($request->IdVoluntario);
        if($inv != null){
        if($vol != null){
            $request->idEmergencia = $inv->idEmergencias;
        if(($request->SuministrosGobierno + $request->SuministrosComision) <= $inv->Suministros){
            $retiroPV = new Retiro_PaquetesV();
            $retiroPV->fill($request->all());
            $retiroPV->idEmergencia = $inv->idEmergencias;
            $retiroPV->save();

        return redirect('/Retiro_PaquetesV/Filtrado')->with('exito','Se ha agregado correctamente');
    }
    else
    return redirect('/Retiro_PaquetesV/create')->with('mensaje','Cantidad de paquetes insuficientes');
}
   else
     return redirect('/Retiro_PaquetesV/create')->with('mensaje','Voluntario no existe');
}
        else
        return redirect('/Retiro_PaquetesV/create')->with('mensaje','Inventario no existe');
    }

    public function generar()
    {
        
        $Retiro = new Retiro_PaquetesV();
        $Retiro = DB::table('retiropaquetes')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('users','retiropaquetes.IdVoluntario','=','users.id')->join('users as c','retiropaquetes.IdAdministradorI','=','c.id')
        ->join('inventario','retiropaquetes.IdInventario','=','inventario.idInventario')
        ->select('retiropaquetes.IdRetiroPaquetes','c.id','c.name','c.Apellido1','c.Cedula',
        'retiropaquetes.NombreChofer','retiropaquetes.Apellido1C','retiropaquetes.Apellido2C',
        'users.Cedula as Ced','users.id as idV','users.name as vol','users.Apellido1 as av','emergencia.idEmergencias',
        'emergencia.NombreEmergencias',
        'retiropaquetes.PlacaVehiculo',
        'retiropaquetes.DireccionAEntregar',
        'retiropaquetes.SuministrosGobierno',
        'retiropaquetes.SuministrosComision',
        'retiropaquetes.created_at','inventario.idInventario')->orderBy('IdRetiroPaquetes')->get();

        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Retiro_PaquetesV.reporte', compact('Retiro', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "landscape");
        $pdf->loadHTML($view);
        return $pdf->stream('Retiro'.'.pdf');

    }
    public function ReporteFecha(request $request){

        $Retiro = new Retiro_PaquetesV();
        $Retiro = DB::table('retiropaquetes')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('users','retiropaquetes.IdVoluntario','=','users.id')->join('users as c','retiropaquetes.IdAdministradorI','=','c.id')
        ->join('inventario','retiropaquetes.IdInventario','=','inventario.idInventario')->whereBetween('retiropaquetes.created_at', array($request->Fecha1,$request->Fecha2))
        ->select('retiropaquetes.IdRetiroPaquetes','c.id','c.name','c.Apellido1','c.Cedula',
        'retiropaquetes.NombreChofer','retiropaquetes.Apellido1C','retiropaquetes.Apellido2C',
        'users.Cedula as Ced','users.id as idV','users.name as vol','users.Apellido1 as av','emergencia.idEmergencias',
        'emergencia.NombreEmergencias',
        'retiropaquetes.PlacaVehiculo',
        'retiropaquetes.DireccionAEntregar',
        'retiropaquetes.SuministrosGobierno',
        'retiropaquetes.SuministrosComision',
        'retiropaquetes.created_at','inventario.idInventario')->orderBy('IdRetiroPaquetes')->get();

        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Retiro_PaquetesV.reporte', compact('Retiro', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "landscape");
        $pdf->loadHTML($view);
        return $pdf->stream('Retiro'.'.pdf');
    }

    public function generarF()
    {
        
        $Retiro = new Retiro_PaquetesV();
        $Retiro = DB::table('retiropaquetes')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('users','retiropaquetes.IdVoluntario','=','users.id')->join('users as c','retiropaquetes.IdAdministradorI','=','c.id')
        ->join('inventario','retiropaquetes.IdInventario','=','inventario.idInventario')->where('emergencia.Estado','Activa')
        ->select('retiropaquetes.IdRetiroPaquetes','c.id','c.name','c.Apellido1','c.Cedula',
        'retiropaquetes.NombreChofer','retiropaquetes.Apellido1C','retiropaquetes.Apellido2C',
        'users.Cedula as Ced','users.id as idV','users.name as vol','users.Apellido1 as av','emergencia.idEmergencias',
        'emergencia.NombreEmergencias',
        'retiropaquetes.PlacaVehiculo',
        'retiropaquetes.DireccionAEntregar',
        'retiropaquetes.SuministrosGobierno',
        'retiropaquetes.SuministrosComision',
        'retiropaquetes.created_at','inventario.idInventario')->orderBy('IdRetiroPaquetes')->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Retiro_PaquetesV.reporteF', compact('Retiro', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "landscape");
        $pdf->loadHTML($view);
        return $pdf->stream('Retiro'.'.pdf');

    }
    public function ReporteFechaF(request $request){

        $Retiro = new Retiro_PaquetesV();
        $Retiro = DB::table('retiropaquetes')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('users','retiropaquetes.IdVoluntario','=','users.id')->join('users as c','retiropaquetes.IdAdministradorI','=','c.id')
        ->join('inventario','retiropaquetes.IdInventario','=','inventario.idInventario')->where('emergencia.Estado','Activa')
        ->whereBetween('retiropaquetes.created_at', array($request->Fecha1,$request->Fecha2))
        ->select('retiropaquetes.IdRetiroPaquetes','c.id','c.name','c.Apellido1','c.Cedula',
        'retiropaquetes.NombreChofer','retiropaquetes.Apellido1C','retiropaquetes.Apellido2C',
        'users.Cedula as Ced','users.id as idV','users.name as vol','users.Apellido1 as av','emergencia.idEmergencias',
        'emergencia.NombreEmergencias',
        'retiropaquetes.PlacaVehiculo',
        'retiropaquetes.DireccionAEntregar',
        'retiropaquetes.SuministrosGobierno',
        'retiropaquetes.SuministrosComision',
        'retiropaquetes.created_at','inventario.idInventario')->orderBy('IdRetiroPaquetes')->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Retiro_PaquetesV.reporteF', compact('Retiro', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "landscape");
        $pdf->loadHTML($view);
        return $pdf->stream('Retiro'.'.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $retiroPV = Retiro_PaquetesV::find($id);
        return view('Retiro_PaquetesV.edit', compact('retiroPV'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionRetiroPaquetes $request, $id)
    {
        $retiroPV = Retiro_PaquetesV::find($id);
        $retiroPV->fill($request->all());
        $retiroPV->save();

        return redirect('Retiro_PaquetesV/Filtrado')->with('exito','Se ha actualizado correctamente');

    }
    public function getUsers(Request $request){

        $search = $request->search;

        if($search == ''){
           $Users = DB::select('select users.Cedula, users.id, users.name, users.Apellido1, users.Apellido2
           from users inner join model_has_roles on users.id = model_has_roles.model_id inner join roles on roles.id = model_has_roles.role_id 
           where roles.name = "Voluntario" order by users.Cedula asc LIMIT 5');
        }else{
           $Users = DB::select('select users.Cedula, users.id, users.name, users.Apellido1, users.Apellido2
           from users inner join model_has_roles on users.id = model_has_roles.model_id inner join roles on roles.id = model_has_roles.role_id 
           where roles.name = "Voluntario" AND Cedula like "%'.$search .'%" OR users.name like "%'.$search.'%" order by users.Cedula asc LIMIT 5');
        }

        $response = array();
        foreach($Users as $user){
           $response[] = array(
                "id"=>$user->id,
                "Cedula"=>$user->Cedula,
                "name"=>$user->name,
                "Apellido1"=>$user->Apellido1,
                "Apellido2"=>$user->Apellido2
           );
        }

        echo json_encode($response);
        exit;
     }
     public function getInventario(Request $request){
        $search = $request->search;
        $Inven = new Inventario();
        if($search == ''){
           $Inven = DB::table('inventario')->join('emergencia','inventario.idEmergencias','=','emergencia.idEmergencias')->where('emergencia.estado','Activa')->select('inventario.idInventario',
           'emergencia.idEmergencias',
           'emergencia.NombreEmergencias',
           'inventario.idInventario')->orderby('idInventario','asc')->limit(5)->get();
        }else{
           $Inven = Inventario::orderby('idInventario','asc')->select('idInventario')->where('idInventario', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($Inven as $Inv){
           $response[] = array(
                "id"=>$Inv->idInventario,
                "NombreE"=>$Inv->NombreEmergencias
           );
        }

        echo json_encode($response);
        exit;
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
      $retiroPV = Retiro_PaquetesV::find($id);
      if(EntregaDonaciones::where('IdRetiroPaquetes',$id)->first()){
        return redirect('Retiro_PaquetesV/Filtrado')->with('mensaje','No se puede eliminar el registro tiene entregas de donaciones asignadas');
        }
      $retiroPV->delete();
      return redirect('Retiro_PaquetesV/Filtrado')->with('exito','Se ha eliminado correctamente');
    }
}
