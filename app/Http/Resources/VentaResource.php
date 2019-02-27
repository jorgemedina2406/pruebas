<?php

namespace App\Http\Resources;

use App\Cliente;
use App\Producto;
use Illuminate\Http\Resources\Json\JsonResource;

class VentaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $productos = collect();
        $total     = 0;

        foreach($this->productos as $item)
        {
            $quantity = $item->pivot->quantity;
            $total   += $item->price * $quantity; 

            $productos->push([
                'quantity' => $quantity,
                'product'  => $item->name,
                'price'    => (int)$item->price,
                'subtotal' => $item->price * $quantity
            ]);

        }

        return [
            'id' => $this->id,
            'client' => 
                Cliente::select('name', 'lastname')->where('id', $this->cliente_id)->first(),
            'detail' => $productos,
            'total'  => $total
        ];
    }
}
