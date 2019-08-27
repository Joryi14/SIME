<?php

namespace App\Http\Controllers;

use App\Censo;
use Illuminate\Http\Request;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Censo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Censo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $censo = new Censo();
        $censo->IdJefeFam = $request->input('IdJefeFam');
        $censo->Refrigerador = $request->input('Refrigerador');
        $censo->Cocina = $request->input('Cocina');
        $censo->Colchon = $request->input('Colchon');
        $censo->Cama = $request->input('Cama');
        $censo->save();

        return 'Dato guardado';
        //$permiso = DB::insert("call insert_Censo('$request->IdJefeFam','$request->Refrigerador', '$recuest->Cocina' ,'$request->Colchon' ,'$recuest->Cama')");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
