<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LecturerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->whenLoaded('user')),
            'bankAccount' => $this->bank_account,
            'rank' => $this->rank,
            'subjects' => new SubjectCollection($this->subjects)
        ];
    }
}
