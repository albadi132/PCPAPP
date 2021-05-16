<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProblemResource extends JsonResource
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
            'name' => $this->name,
            'points'=> $this->points,
            'route'=> $request->getRequestUri().'/'.preg_replace("/[\s_]/", "_", $this->name)
            
        ];
    }
}
