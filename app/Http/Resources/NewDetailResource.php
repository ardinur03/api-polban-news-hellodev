<?php

namespace App\Http\Resources;

use App\Models\Gallery;
use App\Models\News;
use App\Models\User;
use App\Models\UserAssociationOrganization;
use App\Models\UserCampusOrganization;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class NewDetailResource extends JsonResource
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

        $campus_organization = new UserCampusOrganization;
        $association_organization = new UserAssociationOrganization;

        if ($this->scope == 'pusat') {
            $logo = $campus_organization->getLogoByUserId($this->user_id);
        } else if ($this->scope == 'himpunan') {
            $logo = $association_organization->getLogoByUserId($this->user_id);
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
            'logo'              => $logo,
            'galleries'         => $galleries,
            'created_at'        => Carbon::parse($this->created_at)->timestamp,
        ];
    }
}
