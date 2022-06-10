<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias['categorias'] = Categoria::paginate();
        return view('categoria/index', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->except('_token');



        if ((Categoria::where('nombre', '=', $data['nombreCategoria'])->first()) === null) {
            $categoria = new Categoria;
            $categoria->nombre = $data['nombreCategoria'];
            $categoria->save();

            $categorias['categorias'] = Categoria::paginate();
            return view('categoria/index', $categorias);
        } else {
            $categorias['categorias'] = Categoria::paginate();
            return view('categoria/index', $categorias);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);

        return view('categoria/edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosCategoria = request()->except(['_token', '_method']);
        $categoria = Categoria::find($id);
        $categoria->nombre = $datosCategoria['nombreCategoriaEdit'];

        $categoria->save();
        $categorias['categorias'] = Categoria::paginate();
        return view('categoria/index', $categorias);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $categoria = Categoria::find($id);

        $categoria->delete();

        $categorias['categorias'] = Categoria::paginate();

        return view('categoria/index', $categorias);
    }
}
