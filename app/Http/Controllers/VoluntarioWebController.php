<?php

namespace App\Http\Controllers;

use App\Models\VoluntarioWeb;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionInscripcionVoluntarios;

class VoluntarioWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voluntariosWeb = VoluntarioWeb::orderBy('IdVoluntarioWeb')->get();
        return view('VoluntarioWeb.index',compact('voluntariosWeb'));
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionInscripcionVoluntarios $request)
    {
        $voluntarioweb = new VoluntarioWeb();  
        $voluntarioweb->NombreVoluntarioWeb = $request->NombreVoluntarioWeb;    
        $voluntarioweb->ApellidoVoluntario1Web = $request->ApellidoVoluntario1Web;
        $voluntarioweb->ApellidoVoluntario2Web = $request->ApellidoVoluntario2Web;
        $voluntarioweb->CedulaVoluntarioWeb = $request->CedulaVoluntarioWeb;
        $voluntarioweb->TelefonoVoluntarioWeb = $request->TelefonoVoluntarioWeb;
        $voluntarioweb->NacionalidadVoluntarioWeb = $request->NacionalidadVoluntarioWeb;
        $voluntarioweb->OcupacionWeb = $request->OcupacionWeb;
        $voluntarioweb->PatologiaWeb = $request->PatologiaWeb;
        $voluntarioweb->save();  
        header("location: /VoluntarioWeb");
        
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
        $voluntarioweb = VoluntarioWeb::find($id);
        return view('VoluntarioWeb.edit', compact('voluntarioweb'));
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
        $voluntarioweb = VoluntarioWeb::find($id);
        $voluntarioweb->fill($request->all());
        $voluntarioweb->save();
        header("location: /VoluntarioWeb");
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
            if (VoluntarioWeb::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
        
    
    }
}
