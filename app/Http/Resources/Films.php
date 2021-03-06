<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Films extends JsonResource
{

    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'synopsis'=> $this->synopsis,
            'director'=> $this->director,
            'release_date' => $this->release_date->format('d/m/Y'),
            'country' => $this->country,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
