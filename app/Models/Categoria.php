<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'nombre',        
    ];

    public function productos(){
        return $this->belongsToMany('App\Models\Producto','productos_categorias')->withPivot('producto_id');
    }

    
}

