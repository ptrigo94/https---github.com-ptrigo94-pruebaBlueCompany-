<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'precio',
        'fecha_expiracion',
        
    ];
    
    protected $casts = [
        'fecha_expiracion' => 'datetime',
    ];
    public function categorias(){
        return $this->belongsToMany('App\Models\Categoria','productos_categorias')->withPivot('categoria_id');
    }
}
