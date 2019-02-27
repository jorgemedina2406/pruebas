<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;
use App\Http\Resources\VentaResource;
use App\Http\Resources\VentasResource;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Venta $ventas)
    {

        $transaccion = $ventas->with('productos')->first();

        VentaResource::withoutWrapping();
        
        return new VentaResource($transaccion);
                
    }
}
