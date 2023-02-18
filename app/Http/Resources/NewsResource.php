<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class NewsResource extends JsonResource
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
            'code_organization' => $this->code,
            // 'author' => $this->user()->first()->name,
            // created_at menggunakan epoch
            'created_at' => Carbon::parse($this->created_at)->timestamp,
        ];
    }
}
