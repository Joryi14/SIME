<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionesAlbergue;
use App\Models\Albergue;
use Illuminate\Http\Request;

class AlbergueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albergue = Albergue::orderBy('idAlbergue')->get();
        return view('Albergue.index', compact('albergue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Albergue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionesAlbergue $request)
    {
        $albergue = new Albergue();
        $albergue->Nombre = $request->Nombre;
        $albergue->Distrito = $request->Distrito;  
        $albergue->Comunidad = $request->Comunidad;
        $albergue->TipoDeInstalacion = $request->TipoDeInstalacion;
        $albergue->Capacidad = $request->Capacidad;
        $albergue->IdResponsable = $request->IdResponsable;
        $albergue->telefono = $request->telefono;
        $albergue->Duchas = $request->Duchas;
        $albergue->inodoros = $request->inodoros;
        $albergue->EspaciosDeCocina = $request->EspacioDeCocina;
        $albergue->Bodega = $request->Bodega;
        $albergue->Longitud = $request->Longitud;
        $albergue->Latitud = $request->Latitud;
        $albergue->Nececidades = $request->Nececidades;
        $albergue->save();  
        header("location: /Albergue");
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
        $albergue = Albergue::find($id);
        return view('Albergue.edit', compact('albergue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionesAlbergue $request, $id)
    {
        $albergue = Albergue::find($id);
        $albergue->fill($request->all());
        $albergue->save();
        header("location: /Albergue");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        if ($request->ajax()) {
            if (Albergue::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
