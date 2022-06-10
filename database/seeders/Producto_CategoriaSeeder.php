<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use Illuminate\Support\Facades\DB;

class Producto_CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json seeders/productos_categorias.json');
        $pc = json_decode($json);
        foreach ($pc as $prodCat) {
            DB::table('productos_categorias')->insert([

                "id" => $prodCat->id,
                "categoria_id" => $prodCat->categoria_id,
                "producto_id" => $prodCat->producto_id
            ]);
        }
    }
}
