<?php

namespace App;

use App\Venta;
use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    
    protected $table = 'productos';
    
    protected $fillable = ['name', 'description', 'quantity', 'price'];

    public function ventas()
    {
        return $this->belongsToMany(Venta::class)->withPivot('quantity');
    }

}
