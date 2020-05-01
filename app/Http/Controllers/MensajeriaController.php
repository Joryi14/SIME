<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionMensajeria;
use App\Models\Emergencia;
use App\Models\Mensajeria;
use Illuminate\Http\Request;

class MensajeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajerias = Mensajeria::orderBy('IdMensajeria')->get();
        return view('Mensajeria.index', compact('mensajerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mensajeria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionMensajeria $request)
    {
        $mensajeria = new Mensajeria();
        $mensajeria->fill($request->all());
        $mensajeria->save();
        return redirect('Mensajeria')->with('exito','Se ha agregado correctamente');
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
        $mensajeria = Mensajeria::find($id);
        return view('Mensajeria.edit', compact('mensajeria'));
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMensajeria $request, $id)
    {
        $mensajeria = Mensajeria::find($id);
        $mensajeria->fill($request->all());
        $mensajeria->save();
        return redirect('Mensajeria')->with('mensaje','Editado correctamente');
    }
    public function getEmergeM(Request $request){

        $search = $request->search;
        if($search == ''){
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias','Estado')->where('Estado','Activa')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias','Estado')->where('NombreEmergencias', 'like', '%' .$search . '%')->where('Estado','Activa')->limit(5)->get();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $user = Mensajeria::find($id);
        $user->delete();
        return redirect('Mensajeria')->with('Se ha eliminado correctamente');
    
    }
}
