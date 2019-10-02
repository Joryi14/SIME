<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Chofer;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chofer = Chofer::orderBy('idChofer')->get();
        return view('Chofer.index', compact('chofer'));
    }


    
}
