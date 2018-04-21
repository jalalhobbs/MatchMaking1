<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PotentialMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'email' => $this->email,
            'email2' => $this->email
//            'gender' => $this->genders.name
        ];
    }
}
