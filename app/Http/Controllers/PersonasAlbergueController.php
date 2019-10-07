<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionPersonasAlbergue;
use App\Models\Albergue;
use App\Models\JefeDeFamilia;
use App\Models\PersonasAlbergue;
use Illuminate\Http\Request;

class PersonasAlbergueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = PersonasAlbergue::orderBy('idregistroA')->get();
        return view('PersonasAlbergue.index', compact('persona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PersonasAlbergue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionPersonasAlbergue $request)
    {
        if(JefeDeFamilia::find($request->idJefe)){
        if(Albergue::find($request->idAlbergue!=NULL)){
            $persona = new PersonasAlbergue();
        $persona->idAlbergue = $request->idAlbergue;
        $persona->idJefe = $request->idJefe;  
        $persona->LugarDeProcedencia = $request->LugarDeProcedencia;
        $persona->FechaDeIngreso = $request->FechaDeIngreso;
        $persona->HoraDeIngreso = $request->HoraDeIngreso;
        $persona->FechaDeSalida = $request->FechaDeSalida;
        $persona->HoraDeSalida = $request->HoraDeSalida;
        $persona->save();  
        return redirect('PersonasAlbergue')->with('mensaje','Se ha agregado correctamente');}
        else
        return redirect('PersonasAlbergue/create')->with('mensaje','Error El Albergue no Existe');
        }
        else
        return redirect('PersonasAlbergue/create')->with('mensaje','Error El Jefe de Familia no Existe');
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
        $persona = PersonasAlbergue::find($id);
        return view('PersonasAlbergue.edit', compact('persona'));
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
        $persona = PersonasAlbergue::find($id);
        $persona->fill($request->all());
        $persona->save();
        return redirect('PersonasAlbergue')->with('mensaje','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $persona = PersonasAlbergue::find($id);
      $persona->delete();
      return redirect('PersonasAlbergue')->with('Se ha eliminado correctamente');
    }
}
