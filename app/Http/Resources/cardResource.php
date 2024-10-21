<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class cardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'text'=>$this->text,
            'description'=>$this->description,
            'description_photo'=>$this->description_photo,
            'photo'=>($this->photo)?asset('card_image/').'/'.$this->photo:null,
            'color'=>$this->color,
            'position'=>$this->position,
            'start_time'=>$this->start_time,
            'end_time'=>$this->end_time,
            'completed'=>$this->completed,
            'lest_id'=>$this->lest_id,
            ];
    }
}
