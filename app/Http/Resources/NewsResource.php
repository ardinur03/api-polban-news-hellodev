<?php

namespace App\Http\Resources;

use App\Models\CampusOrganization;
use App\Models\FacultyOrganization;
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

        if (CampusOrganization::where('code_campus_organization', $this->code)->first()) {
            $created_by = 'pusat';
        } elseif (FacultyOrganization::where('code_faculty_organization', $this->code)->first()) {
            $created_by = 'himpunan';
        } else {
            $created_by = null;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'brief_overview' => $this->brief_overview,
            'reading_time' => $this->reading_time,
            'status' => $this->status,
            'code_organization' => $this->code,
            'author' => $user->name,
            'scope' => $created_by,
            'created_at' => Carbon::parse($this->created_at)->timestamp,
        ];
    }
}
