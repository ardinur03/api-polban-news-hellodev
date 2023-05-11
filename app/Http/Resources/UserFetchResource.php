<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserFetchResource extends JsonResource
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
            'id'                 => $this->id,
            'user_code'          => $this->user_code,
            'name'               => $this->name,
            'email'              => $this->email,
            'profile_photo_path' => $this->profile_photo_path,
            'study_name'   => $this->student->study_program->study_name,
            'faculty_name' => $this->student->study_program->faculty->faculty_name,
            'cohort_year'  => $this->student->cohort_year,
            'address'      => $this->student->address,
            'phone_number' => $this->student->phone_number
        ];
    }
}
