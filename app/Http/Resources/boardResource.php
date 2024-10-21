<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class boardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id'        => $this->id,
            'name'      => $this->name,
            'photo'      => ($this->photo)?asset('board_image/').'/'.$this->photo:null,
            'lists_of_the_board' =>(!$this->lists)? 'not found':$this->lists->map(function($list) {
            return [
            'id'=>$list->id,
            'title'=>$list->title,
            ];
        }),
            //'lists_of_the_board'     => TheListResource::collection($this->whenLoaded('lists')),
            //'users' => UserResource::collection($this->whenLoaded('users')), // Include boards
        ];
    }
}
