<?php

use App\Venta;
use App\Cliente;
use App\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Cliente::truncate();
        Producto::truncate();
        Venta::truncate();
        DB::table('producto_venta')->truncate();

        $cantidadClientes = 5;
        $cantidadProductos = 10;
        $cantidadVentas = 5;

        factory(Cliente::class, $cantidadClientes)->create();

        
        factory(Producto::class, $cantidadProductos)->create();

        
        factory(Venta::class, $cantidadVentas)->create()->each(
			function ($venta) {
                $qty = mt_rand(1, 5);
				$productos = Producto::all()->random(mt_rand(1, 5))->pluck('id');
                 
				$venta->productos()->attach($productos, ['quantity' => $qty]);
			}
        );
        
        // factory(Venta::class, $cantidadVentas)->create();
    }
}
