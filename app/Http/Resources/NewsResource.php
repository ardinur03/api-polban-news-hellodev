<?php

namespace App\Http\Resources;

use App\Models\Gallery;
use App\Models\User;
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
        $user = User::find($this->user_id);

        $galleries = [];
        $data_galleries = Gallery::all();
        foreach ($data_galleries as $gallery) {
            if ($this->id == $gallery->news_id) {
                array_push($galleries, $gallery->picturePath);
            }
        }

        return [
            'id'                => $this->id,
            'title'             => $this->title,
            'slug'              => $this->slug,
            'content'           => $this->content,
            'brief_overview'    => $this->brief_overview,
            'reading_time'      => $this->reading_time,
            'status'            => $this->status,
            'code_organization' => $this->code,
            'author'            => $user->name,
            'scope'             => $this->scope,
            'galleries'         => $galleries,
            'created_at'        => Carbon::parse($this->created_at)->timestamp,
        ];
    }
}
