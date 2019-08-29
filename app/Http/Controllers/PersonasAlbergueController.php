<?php

namespace App\Http\Controllers;
use App\Models\PersonaAlbergue;
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
        $persona = PersonaAlbergue::orderBy('idregistroA')->get();
        return view('PersonaAlbergue.index', compact('persona'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PersonaAlbergue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona = new PersonaAlbergue();
        $persona->idAlbergue = $request->idAlbergue;
        $persona->idJefe = $request->idJefe;  
        $persona->LugarDeProcedencia = $request->LugarDeProcedencia;
        $persona->FechaDeIngreso = $request->FechaDeIngreso;
        $persona->HoraDeIngreso = $request->HoraDeIngreso;
        $persona->FechaDeSalida = $request->FechaDeSalida;
        $persona->HoraDeSalida = $request->HoraDeSalida;
        $persona->save();  
        header("location: /PersonaAlbergue");
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
        $persona = PersonaAlbergue::find($id);
        return view('PersonaAlbergue.edit', compact('persona'));
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
        $persona = PersonaAlbergue::find($id);
        $persona->fill($request->all());
        $persona->save();
        header("location: /PersonaAlbergue");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if ($request->ajax()) {
            if (PersonaAlbergue::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
