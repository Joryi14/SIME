<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Inventario;
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
    public function store(Request $request)
    {
       
        $inventario = DB::select("call Insert_Inventario(
            '$request->idEmergencias',
            '$request->Suministros',
            '$request->Colchonetas',
           '$request->Cobijas',
          '$request->Ropa')");
        header("location: /Inventario");
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
        header("location: /Inventario");
    }

    public function generar()
    {
        $inventario = \DB::table('inventario')
       ->select(['idInventario','idEmergencias',
       'Suministros',
       'Colchonetas',
       'Cobijas',
       'Ropa']) 
        ->get();
        $today = Carbon::now()->format('d/m/Y');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventario= DB::update("call Update_Inventario('$id','$request->idEmergencias',
        '$request->Suministros',
        '$request->Colchonetas',
       '$request->Cobijas',
      '$request->Ropa')");
        header("location: /Inventario");
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
        $inventario->delete();
        return redirect('Inventario')->with('Se ha eliminado correctamente');
    }
}
