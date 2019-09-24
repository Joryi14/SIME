<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\EntregaDonacionesAlbergue;
use Illuminate\Http\Request;

class EntregaDonacionesAlbergueController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregadonacionesAlbergue = EntregaDonacionesAlbergue::orderBy('IdEntregaA')->get();
        return view('EntregaDonacionesAlbergue.index', compact('entregadonacionesAlbergue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EntregaDonacionesAlbergue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entregadonacionesA = DB::select("call Insert_EntregaDonacionesAlbergue('$request->IdJefeFa')");  
        header("location:EntregaDonacionesAlbergue");
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
        $entregadonacionesA = EntregaDonacionesAlbergue::find($id);
        return view('EntregaDonacionesAlbergue.edit', compact('entregadonacionesA'));
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
        $entregadonacionesA = DB::update("call Update_EntregaDonacionesAlbergue('$id','$request->IdJefeFa')");
        header("location: /EntregaDonacionesAlbergue");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $EntregaDonacionesAlbergue = EntregaDonacionesAlbergue::find($id);
        $EntregaDonacionesAlbergue->delete();
        return redirect('EntregaDonacionesAlbergue')->with('Se ha eliminado correctamente');
    }
}
