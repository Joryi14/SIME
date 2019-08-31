<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use App\Models\Admin\Menurol;
use App\Models\Admin\rol;

class MenurolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $rols = rol::orderBy('IdRol')->pluck('NombreRol','IdRol')->toArray();
        $menus = Menu::getMenu();
        $menusRols =  Menurol::with('roles')->get()->pluck('roles','id')->toArray();
        return view('admin.menu-rol.index',compact('rols','menus','menusRols'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
