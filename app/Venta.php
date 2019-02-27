<?php

namespace App;

use App\Cliente;
use App\Producto;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = ['cliente_id'];

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('quantity');
    }


}
