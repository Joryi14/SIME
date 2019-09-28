<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::orderBy('IdNoticias')->get();
        return view('Noticia.index', compact('noticias'));
    }
    

    public function index1()
    {
        $noticias = Noticia::orderBy('IdNoticias')->get();
        return view('welcome', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Noticia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          if($request->hasFile('Imagenes')){
            $file = $request->file('Imagenes');
            $ConIMA= file_get_contents($file);
           
        
          }
          
          
          if($request->hasFile('Videos')){
            $file = $request->file('Videos');
            $ConVI= file_get_contents($file);
  
          }
          
          if($request->hasFile('PDF')){
            $file = $request->file('PDF');
            $ConPDF= file_get_contents($file);
  
          }

        $noticia = new Noticia();
        $noticia->created_at = $request->created_at;
        $noticia->Titulo = $request->Titulo;
        $noticia->IdAutor = $request->IdAutor;
      
         $noticia->Imagenes = base64_encode($ConIMA); 
      
        $noticia->Videos =base64_encode($ConVI);
        $noticia->Articulo = $request->Articulo;
        $noticia->PDF = base64_encode($ConPDF);
        $noticia ->save();  
        header("location: /Noticia");

        
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


        $noticia = Noticia::find($id);
        return view('Noticia.edit', compact('noticia'));
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
        $noticia = Noticia::find($id);
       

        
       
        $noticia ->Titulo = $request->input('Titulo');
        $noticia ->IdAutor = $request->input('IdAutor');
        if($request->hasFile('Imagenes')){
            $file = $request->file('Imagenes');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$name);
            $noticia ->Imagenes = $name;
  
          }

          if($request->hasFile('Videos')){
            $file = $request->file('Videos');
            $nameV = time().$file->getClientOriginalName();
            $file->move(public_path().'/Vide/',$nameV);
            $noticia->Videos = $nameV;
  
          }

          $noticia ->Articulo = $request->input('Articulo');

          if($request->hasFile('PDF')){
            $file = $request->file('PDF');
            $nameP = time().$file->getClientOriginalName();
            $file->move(public_path().'/PD/',$nameP);
            $noticia->PDF = $nameP;
  
          }
       
        $noticia->save();
        header("location: /Noticia");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id , Request $request)
    {
        if ($request->ajax()) {
            if (Noticia::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
