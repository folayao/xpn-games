<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoGameResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'       => $this->getId(),
            'title'    => $this->getTitle(),
            'category' => $this->getCategory(),
            'details'  => $this->getDetails(),
            'price'    => $this->getPrice(),
        ];
    }
}
