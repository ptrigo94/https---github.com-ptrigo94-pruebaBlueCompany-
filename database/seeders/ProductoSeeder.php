<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json seeders/productos.json');
        $productos = json_decode($json);
        foreach ($productos as $producto) {
            $prod = new Producto;
            $prod->nombre = $producto->nombre;
            $prod->id = $producto->id;
            $prod->fecha_expiracion = $producto->fecha_expiracion;
            $prod->precio = $producto->precio;
            $prod->save();
         }
    }
}
