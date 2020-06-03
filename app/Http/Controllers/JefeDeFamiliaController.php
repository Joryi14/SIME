<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\JefeDeFamilia;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionJefeDeFamilia;
use App\Http\Requests\ValidacionFamilia;
use App\Models\Censo;
use App\Models\EntregaDonaciones;
use App\Models\EntregaDonacionesAlbergue;
use App\Models\Familias;
use App\Models\PersonasAlbergue;

class JefeDeFamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JefeF = JefeDeFamilia::orderBy('IdJefe')->get();
        $je = NULL;
        return view('JefeDeFamilia.index', compact('JefeF','je'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JefeDeFamilia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionJefeDeFamilia $request)
    {
        if(JefeDeFamilia::where('Cedula',$request->Cedula)->first()){
            return redirect('JefeDeFamilia/create')->with('mensaje','Error cedula ya existente');
       }
        $patologia = implode(', ',$request->Patologia);
        $Jefe = new JefeDeFamilia();
        $Jefe->fill($request->all());
        $Jefe->Patologia = $patologia;
        $Jefe->save();
       return redirect('JefeDeFamilia')->with('exito','Se ha agregado correctamente');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Je = JefeDeFamilia::find($id);
      return response()->json(array($Je)); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $JefeF = JefeDeFamilia::find($id);
        return view('JefeDeFamilia.edit', compact('JefeF'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionJefeDeFamilia $request, $id)
    { 
        $patologia = implode(', ',$request->Patologia);
        $Jefe = JefeDeFamilia::find($id);
        $Jefe->fill($request->all());
        $Jefe->Patologia = $patologia;
        $Jefe->save();
        return redirect('JefeDeFamilia')->with('exito','Se ha actualizado correctamente');
    }
    public function agregarfamiliar($id)
    {
        $JefeF = JefeDeFamilia::find($id);
        return view('JefeDeFamilia.Familiar', compact('JefeF'));
    }
    public function Familiar(ValidacionFamilia $request, $id)
    {
        if(Familias::where('Cedula',$request->Cedula)->first()){
         return redirect('JefeDeFamilia/'.$request->IdJefeF.'/agregarfamiliar')->with('mensaje','Error cedula ya existente');
        }
        $jefe = JefeDeFamilia::find($request->IdJefeF);
        if($jefe){
         $Patologia = implode(', ',$request->Patologia);
         $fam = new Familias();
         $fam->fill($request->all());
         $fam->Patologia = $Patologia;
         $fam->save();
         $jefe->TotalPersonas+= 1;
         $jefe->save();
         return redirect('JefeDeFamilia')->with('exito','Se ha agregado correctamente'); 
        }
        else
        return redirect('JefeDeFamilia/'.$request->IdJefeF.'/agregarfamiliar')->with('mensaje','Error este jefe de familia no existe');  
        }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $jefe = JefeDeFamilia::find($id);

        if(Familias::where('idJefeF',$id)->first()){
        return redirect('JefeDeFamilia')->with('mensaje','Error este jefe tiene familia asignada');
        }
        if(Censo::where('idJefeFam',$id)->first()){
            return redirect('JefeDeFamilia')->with('mensaje','Error este jefe tiene un censo asignado');
            }
        if(EntregaDonaciones::where('idJefe',$id)->first()){
                return redirect('JefeDeFamilia')->with('mensaje','Error este jefe tiene una entrega de paquetes');
        }
        if(EntregaDonacionesAlbergue::where('idJefeFa',$id)->first()){
            return redirect('JefeDeFamilia')->with('mensaje','Error este jefe tiene una entrega de paquetes en albergue');
    }
    if(PersonasAlbergue::where('idJefe',$id)->first()){
        return redirect('JefeDeFamilia')->with('mensaje','Error este jefe se encuentra en un albergue');
}
        else{
        $jefe->delete();
        return redirect('JefeDeFamilia')->with('exito','Se ha eliminado correctamente');
        }
    }
}
