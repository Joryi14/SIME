<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionInventario;
use App\Models\Emergencia;
use Illuminate\Support\Facades\DB;
use App\Models\Inventario;
use App\Models\Retiro_PaquetesV;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::orderBy('idInventario')->get();
        return view('Inventario.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Inventario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionInventario $request)
    {
        $inv = new Inventario();
        $inv->fill($request->all());
        $inv->save();

        return redirect('Inventario')->with('exito','Se ha agregado correctamente');
    }
    public function editSuministro($id)
    {
        $inventario = Inventario::find($id);
        return view('Inventario.Suministro', compact('inventario'));
    }

    public function updateSuministro(Request $request, $id)
    {
        $t = $request->Suministros;
        $tt = $request->suma;
        $total = $t+$tt;
        $inventario = DB::update("call Update_Suministros('$id','$request->idEmergencias','$total')");
        return redirect('Inventario')->with('exito','Se ha actualizado correctamente la cantidad de suministros');

    }
    public function ReporteFecha(request $request){

        $inventario = Inventario::orderby('idInventario')->whereBetween('created_at', array($request->Fecha1,$request->Fecha2))
        ->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Inventario.reporte', compact('inventario', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('inventario'.'.pdf');
    }
    public function generar()
    {
        $inventario = Inventario::orderBy('idInventario')->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Inventario.reporte', compact('inventario', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('inventario'.'.pdf');

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
        $inventario = Inventario::find($id);
        return view('Inventario.edit', compact('inventario'));
    }

    public function getEmergencia(Request $request){

        $search = $request->search;
        if($search == ''){
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias')->where('idEmergencias', 'like', '%' .$search . '%')->limit(5)->get();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionInventario $request, $id)
    {
        $inventario = Inventario::find($id);
        $inventario->fill($request->all());
        $inventario->save();
      return redirect('Inventario')->with('exito','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $inventario = Inventario::find($id);
        if(Retiro_PaquetesV::where('IdInventario',$id)->first()){
            return redirect('Inventario')->with('mensaje','No se puede eliminar el inventario tiene retiros de donaciones asignados');
            }
        $inventario->delete();
        return redirect('Inventario')->with('exito','Se ha eliminado correctamente');
    }
}
