<?php

namespace App\Http\Controllers;

use App\Models\Producto;

use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('producto/index')->with(
            [
                'productos' => Producto::orderBy('nombre')->get(),
                'categorias' => Categoria::orderBy('nombre')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        if ((Producto::where('nombre', '=', $data['nombreProducto'])->first()) === null) {
            $producto = new Producto;
            $producto->nombre = $data['nombreProducto'];
            $producto->precio = $data['precioProducto'];
            $producto->fecha_expiracion = $data['fechaexp'] ?? null;
            $producto->save();

            $producto->categorias()->attach($data['categoria']);
            return view('producto/index')->with(
                [
                    'productos' => Producto::orderBy('nombre')->get(),
                    'categorias' => Categoria::orderBy('nombre')->get()
                ]
            );
        } else {
            return view('producto/index')->with(
                [
                    'productos' => Producto::orderBy('id')->get(),
                    'categorias' => Categoria::orderBy('nombre')->get()
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('producto/edit')->with(
            [
                'producto' => Producto::find($id),
                'categorias' => Categoria::orderBy('nombre')->get()
            ]
        );

        //
    }

    public function productos(){

        $productos = Producto::all();
        $listaProductos= array();
        for ($i=0; $i <count($productos) ; $i++) {          
            $prod = new Producto;
            $prod->nombre =$productos[$i]['nombre']; 
            $prod->categorias = $productos[$i]['categorias'];
             
            $prod->precio =$productos[$i]['precio']; 
            $prod->fecha_expiracion =$productos[$i]['fecha_expiracion']; 
            $listaProductos[]= $prod;           
        
        }return json_encode($listaProductos);
    }
    public function productoPorId($id){

        $producto = Producto::whereId($id)->get();
        
        $listaProducto= array();
        for ($i=0; $i <count($producto) ; $i++) {          
            $prod = new Producto;
            $prod->nombre =$producto[$i]['nombre']; 
            $prod->categorias = $producto[$i]['categorias'];
             
            $prod->precio =$producto[$i]['precio']; 
            $prod->fecha_expiracion =$producto[$i]['fecha_expiracion']; 
            $listaProducto[]= $prod;           
        
        }return json_encode($listaProducto);
    }
    public function productoPorCategoria($id){

        $categoria = Categoria::whereId($id)->get();

        $listaProductos = array();
        for ($i=0; $i <count($categoria) ; $i++) { 
            $productos = $categoria[$i]['productos'];
            for ($j=0; $j <count($productos) ; $j++) {          
                $prod = new Producto;
                $prod->nombre =$productos[$j]['nombre'];                  
                $prod->precio =$productos[$j]['precio']; 
                $prod->fecha_expiracion =$productos[$j]['fecha_expiracion']; 
                $listaProductos[]= $prod;           
            
            }        
          
        
        }
        return json_encode($listaProductos);


       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $data = request()->except(['_token', '_method']);

        $producto = Producto::find($id);
       
        $producto->nombre = $data['nombreProductoEdit'];
        $producto->precio = $data['precioProducto'];
        $producto->fecha_expiracion = $data['fechaexp'] ?? null;
        $producto->save();
        if (!$producto->categorias()->where('categoria_id', $data['categoria'])->exists()) {


            $producto->categorias()->attach($data['categoria']);
        }
        return view('producto/index')->with(
            [
                'productos' => Producto::orderBy('id')->get(),
                'categorias' => Categoria::orderBy('nombre')->get()
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();

        return view('producto/index')->with(
            [
                'productos' => Producto::orderBy('id')->get(),
                'categorias' => Categoria::orderBy('nombre')->get()
            ]
        );
    }
}
