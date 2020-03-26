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
           $file =$request->file('Imagenes');
           $name = time().$file->getClientOriginalName();
           $file->move(public_path().'/img/', $name);
           $noticia->Imagenes = $name;
         }
            if($request->hasFile('Videos')){
           $file =$request->file('Videos');
           $nameV = time().$file->getClientOriginalName();
           $file->move(public_path().'/Video/', $nameV);
           $noticia->Videos = $nameV;
         }
         if($request->hasFile('PDF')){
          $file =$request->file('PDF');
          $nameP = time().$file->getClientOriginalName();
          $file->move(public_path().'/PDF/', $nameP);
          $noticia->PDF = $nameP;
        }
        $noticia->Titulo = $request->Titulo;
        $noticia->IdAutor = $request->IdAutor;
        // $noticia->Imagenes = $;
        $noticia->NombrePDF = $request->NombrePDF;
       // $noticia->Videos = $request->Videos;
        $noticia->Articulo = $request->Articulo;
         //$noticia->PDF = $request->PDF;
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
          $file =$request->file('Imagenes');
          $name = time().$file->getClientOriginalName();
          $file->move(public_path().'/img/', $name);
          $noticia->Imagenes = '/img/'+$name;
        }

           if($request->hasFile('Videos')){
          $file =$request->file('Videos');
          $nameV = time().$file->getClientOriginalName();
          $file->move(public_path().'/Video/', $nameV);
          $noticia->Videos = $nameV;
        }

        if($request->hasFile('PDF')){
         $file =$request->file('PDF');
         $nameP = time().$file->getClientOriginalName();
         $file->move(public_path().'/PDF/', $nameP);
         $noticia->PDF = $nameP;
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
      if($noticia->Imagenes != NULL){
      $image_path = public_path().'/img/'.$noticia->Imagenes;
      unlink($image_path);}
      if($noticia->Videos != NULL){
      $videos_path = public_path().'/Video/'.$noticia->Videos;
      unlink($videos_path);}
      if($noticia->PDF != NULL){
      $pdf_path = public_path().'/PDF/'.$noticia->PDF;
      unlink($pdf_path);}
      $noticia->delete();
      return redirect('Noticia')->with('Se ha eliminado correctamente');
    }
}
