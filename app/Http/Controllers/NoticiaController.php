<?php

namespace App\Http\Controllers;
use App\Models\Noticia;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionNoticias;

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
    

    public function index1(Request $request)
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
    public function store(ValidacionNoticias $request)
    {
            $noticia = new Noticia();
          if($request->hasFile('Imagenes')){
            $file = $request->file('Imagenes');
            $fileS = $request->file('Imagenes')->getSize();
            if($fileS <= 536870912){
           
            $noticia->Imagenes = $request->Imagenes = base64_encode( file_get_contents($file));
            }else{
              return redirect('Noticia/create')->with('mensaje','Error La Imagen es muy grande');
            }
          }
            
           
        
          
          
          
          if($request->hasFile('Videos')){
            $file = $request->file('Videos');
            $fileS = $request->file('Videos')->getSize();
            if($fileS <= 536870912){
           
            $noticia->Videos = $request->Videos = base64_encode( file_get_contents($file));
            }else{
              return redirect('Noticia/create')->with('mensaje','Error El Video es muy grande');
            }
           
            
          }
          
          if($request->hasFile('PDF')){
            $file = $request->file('PDF');
            $fileS = $request->file('PDF')->getSize();
            if($fileS <= 536870912){
           $noticia->PDF = $request->PDF = base64_encode( file_get_contents($file));
           $noticia->NombrePDF = $request->NombrePDF = time().$file->getClientOriginalName();
            }else{
              return redirect('Noticia/create')->with('mensaje','Error El PDF es muy grande');
            }
      
  
          }

        $noticia = new Noticia();
        $noticia->created_at = $request->created_at;
        $noticia->Titulo = $request->Titulo;
        $noticia->IdAutor = $request->IdAutor;
      
        $noticia->Imagenes = $request->Imagenes; 
        $noticia->NombrePDF = $request->NombrePDF;
        $noticia->Videos = $request->Videos;
        $noticia->Articulo = $request->Articulo;
        $noticia->PDF = $request->PDF;
        $noticia ->save();  
        return redirect('Noticia')->with('mensaje','Se ha guardado');

        
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
    public function update(ValidacionNoticias $request, $id)
    {
        $noticia = Noticia::find($id);
        $noticia ->Titulo = $request->input('Titulo');
        $noticia ->IdAutor = $request->input('IdAutor');
        if($request->hasFile('Imagenes')){
          $file = $request->file('Imagenes');
          $fileS = $request->file('Imagenes')->getSize();
          if($fileS <= 536870912){
         
          $noticia->Imagenes = $request->Imagenes = base64_encode( file_get_contents($file));
          }else{
            return redirect('Noticia/edit')->with('mensaje','Error La Imagen es muy grande');
          }
          //$ConIMA= file_get_contents($file);
         
      
        }
        if($request->hasFile('Videos')){
          $file = $request->file('Videos');
          $fileS = $request->file('Videos')->getSize();
            if($fileS <= 536870912){
           
            $noticia->Videos = $request->Videos = base64_encode( file_get_contents($file));
            }else{
              return redirect('Noticia/edit')->with('mensaje','Error El Video es muy grande');
            
        }
      }
        if($request->hasFile('PDF')){
          $file = $request->file('PDF');
          $fileS = $request->file('PDF')->getSize();
          if($fileS <= 536870912){
         $noticia->PDF = $request->PDF = base64_encode( file_get_contents($file));
         $noticia->NombrePDF = $request->NombrePDF = time().$file->getClientOriginalName();
          }else{
            return redirect('Noticia/edit')->with('mensaje','Error El PDF es muy grande');
          }
    

        }
        
          

          $noticia ->Articulo = $request->input('Articulo');

         
       
        $noticia->save();
        return redirect('Noticia')->with('mensaje','Editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id , Request $request)
    {
      $noticia = Noticia::find($id);
      $noticia->delete();
      return redirect('Noticia')->with('Se ha eliminado correctamente');
    }
}
