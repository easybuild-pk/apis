<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'profile_picture' => $this->profile_picture,
            'user_type' => $this->user_type,
            'gender' => $this->gender,
            'department' => $this->department,
            'address' => $this->address,
            'district' => $this->district
        ];
    }
}
