<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\userResource;

class workspaaceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'Boardes' => $this->boardes->map(function($boarde) {
            return [
                'name'=>$boarde->name,
                'photo'=>  ($this->photo)?asset('board_image/').'/'.$this->photo:null,
            ];
        }),
            'users' =>  $this->users->map(function($user) {
                return [
                    'username'=>$user->name,
                    'email'=>  $user->email,
                ];}),
        ];
    }
}
