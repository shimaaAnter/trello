<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class listResource extends JsonResource
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
            'title'=>$this->title,
            'cards_of_the_list' =>(!$this->cards)? 'not found':$this->cards->map(function($card) {
            return [
            'id'=>$card->id,
            'text'=>$card->text,
            'description'=>$card->description,
            'description_photo'=>$card->description_photo,
            'photo'=>($card->photo)?asset('card_image/').'/'.$card->photo:null,
            'color'=>$card->color,
            'position'=>$card->position,
            'start_time'=>$card->start_time,
            'end_time'=>$card->end_time,
            'completed'=>$card->completed,
            ];
        }),
            ];
    }
}
