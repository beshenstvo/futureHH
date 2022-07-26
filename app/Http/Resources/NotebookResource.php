<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
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
            'id' => $this->id,
            'fullname' => $this->fullname,
            'company' => $this->company,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'bth' => $this->bth,
            'photo' => asset('storage/uploads/'.$this->photo),
            'created_at' => date("y-m-d", strtotime($this->created_at))
        ];
    }
}
