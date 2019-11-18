<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usuario' => $this->usuario,
            'mes' => $this->mes,
            'monto' => $this->monto,
            'mora' => $this->mora,
            'estado' => $this->estado,
        ];
        //return parent::toArray($request);
    }
}
