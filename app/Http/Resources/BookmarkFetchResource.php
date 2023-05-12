<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookmarkFetchResource extends JsonResource
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
            'id_bookmark' => $this->id,
            'id_news' => $this->news['id'],
            'title' => $this->news['title'],
            'brief_overview' => $this->news['brief_overview'],
            'slug' => $this->news['slug'],
            'reading_time' => $this->news['reading_time']
        ];
    }
}
