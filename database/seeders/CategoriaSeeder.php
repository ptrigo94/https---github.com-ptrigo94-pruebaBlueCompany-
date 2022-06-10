<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get('database/json seeders/categorias.json');
        $categorias = json_decode($json);
        foreach ($categorias as $categoria) {
           $cat = new Categoria;
           $cat->nombre = $categoria->nombre;
           $cat->id = $categoria->id;
           $cat->save();
        }

    }
}
