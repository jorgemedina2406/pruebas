<?php

namespace App;

use App\Cliente;
use App\Producto;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';


    protected $fillable = ['name', 'lastname'];

    public function venta()
    {
        return $this->hasMany(Venta::class);
    }
}
