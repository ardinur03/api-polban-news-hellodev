<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsCenterResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'brief_overview' => $this->brief_overview,
            'reading_time' => $this->reading_time,
            'status' => $this->status,
            'campus_organization_code' => $this->campus_organization_code,
            'name_campus_organization' => $this->name_campus_organization,
        ];
    }
}
